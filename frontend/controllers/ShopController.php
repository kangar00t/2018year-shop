<?php

namespace frontend\controllers;

use Yii;
use common\models\ShopItem;
use common\models\ShopChar;
use common\models\ShopCharValEx;
use common\models\Cart;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Html;


class ShopController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex($filter = '', $url = '')
    {
        $item_count = 12;

        $chars = ShopChar::filterChars();

        if ($filter && $url) {

            $data = ShopChar::UrlToFilter('/'.$url);

            $dataProvider = new ActiveDataProvider([
                'query' => ShopItem::find()->where(['id' => ShopChar::findFilterIds($data)]),
                'pagination' => [
                    'pageSize' => $item_count,
                ],
            ]);

            if (Yii::$app->request->isPost)
                return $this->renderPartial('_preview-item', [
                    'dataProvider' => $dataProvider,
                    'pagination' => [
                        'pageSize' => $item_count,
                    ],
                ]);
            else
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'chars' => $chars,
                    'filter' => ShopChar::UrlToFilterCheck('/'.$url),
                ]);


        } else {

            if ($filter) return Yii::$app->response->redirect(['/shop']);

            $dataProvider = new ActiveDataProvider([
                'query' => ShopItem::find(),
                'pagination' => [
                    'pageSize' => $item_count,
                ],
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'chars' => $chars,
            ]);
        }
    }

    // возвращает урл по состоянию фильтра
    public function actionFilterUrl() {
        if ($data = $_POST['filter']) {
            echo ShopChar::FilterToUrl($data);
        }
    }

    public function actionImpImg()
    {
        $games = ShopItem::find()->orderBy('id DESC')->all();
        $count = 100;
        $i = 1;
        foreach ($games as $game) {
            /*if ($i <= $count) {
                if (!count($game->images)) {
                    echo '<p>'.$game->id.': '.$game->moveImgToBD().'</p>';
                    $i++;
                }
            }
            if (count($game->images)) {
                if (!file_exists('/var/www/u0035406/data/www/kroko.online/frontend/web/images/game/'.$game->id))
                    mkdir('/var/www/u0035406/data/www/kroko.online/frontend/web/images/game/'.$game->id);
                foreach ($game->images as $img) {
                    rename($img, '/var/www/u0035406/data/www/kroko.online/frontend/web/images/game/'.$game->id.'/'.uniqid().'.'.end(explode(".", $img)));
                    echo '<p>/var/www/u0035406/data/www/kroko.online/frontend/web/images/game/'.$game->id.'/'.uniqid().'.'.end(explode(".", $img)).'</p>';
                }
                break;
            }*/
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSearch()
    {
        $data = $_GET['data'];

        $chars = ShopChar::filterChars();

        $dataProvider = new ActiveDataProvider([
            'query' => ShopItem::find()->where(['like', 'name', $data]),
            'pagination' => [
                'pageSize' => 30,
            ],
        ]); 
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'chars' => $chars,
        ]);
    }

    public function actionAddToCart()
    {
        $id = $_POST['id'];
        $count = $_POST['count'];
        echo $this->renderPartial('_mini-cart', ['cart' => Cart::addToCart($id, $count)]);
    }

    protected function findModel($id)
    {
        if (($model = ShopItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
