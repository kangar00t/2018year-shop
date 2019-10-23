<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Boxberry;
use common\models\City;
//use yii\filters\AccessControl;

class CronController extends Controller
{
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['update-cities'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }*/

    public function actionUpdateCities()
    {
        $boxberry = new Boxberry();
        $saved = 0;
        $failed = 0;
        foreach ($boxberry->getCities() as $city) {
            if ($city['CountryCode'] == '643') {
                if (City::updateFromBoxberryApi($city)) {
                    $saved++;
                } else {
                    $failed++;
                }
            }
        }
        return $saved;
    }
}