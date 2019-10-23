<?php

namespace frontend\controllers;

use Yii;
use common\models\ShopItem;
use common\models\ShopChar;
use common\models\ShopCharValEx;
use common\models\Cart;
use common\models\Boxberry;

use yii\web\Controller;
use yii\httpclient\Client;

class CartController extends Controller
{
	public function actionIndex() 
	{
		if (Yii::$app->cart['items'])
			return $this->render('index', [
				'cart' => Yii::$app->cart,
			]);
		return $this->render('empty');
	}

	public function actionTest()
	{
		echo '<pre>';
		$boxberry = new Boxberry();

		var_dump($boxberry->getPrice([
            'weight' => '1',
            'zip' => '394043',
            'target' => '96271'
        ]));

		/*$k=0;
		foreach ($boxberry->getCitiesCourier() as $city) {
			var_dump($city);
		}*/

	 // 	$client = new Client();

		// echo $_SERVER['REMOTE_ADDR'];
		// echo '<pre>';
		// $response = $client->createRequest()
		//     ->setMethod('GET')
		//     ->setUrl('https://suggestions.dadata.ru/suggestions/api/4_1/rs/detectAddressByIp')
		//     ->setData(['token'=>'e680344b24c9ed42485b27728ad88a72036f5d6d', 'ip'=>$_SERVER['REMOTE_ADDR']])
		//     ->send();
		// var_dump($response->data);

		// $response = $client->createRequest()
		//     ->setMethod('GET')
		//     ->setUrl('http://api.boxberry.de/json.php')
		//     ->setData(['token'=>'57198.rnpqdedd', 'method'=>'ListCitiesFull'])
		//     ->send();
		// if ($response->isOk) {
		//     var_dump($response->data);
		//     foreach ($response->data as $data) {
		//     	//echo '<p>'.$data['Name'].'</p>';
		//     }
		// } else {
		// 	echo 'Error';
		// }
	}
}