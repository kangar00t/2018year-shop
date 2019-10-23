<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\ErrorException;

use yii\httpclient\Client;

class Boxberry extends Model
{
	private $client;
	private $city;

	const TOKEN = '57198.rnpqdedd';
	
	public function __construct() {
		$this->client = new Client();
		$cities = [];
		
		parent::__construct();
	}

    /**
     * @param string $method
     * @param array $params
     * @return mixed
     * @throws ErrorException
     */
	public function get($method, $params = [])
    {
        $data = [];
        $response = $this->client->createRequest()
            ->setMethod('GET')
            ->setUrl('http://api.boxberry.de/json.php')
            ->setData(array_merge(['token' => self::TOKEN, 'method' => $method], $params))
            ->send();
        if ($response->isOk) {
            $data = $response->data;
        } else {
            throw new ErrorException("Error Processing Request", 1);
        }
        return $data;
    }
	public function getCities()
	{
		if (!count($this->city)) {
			$this->city = $this->get('ListCitiesFull');
		}
		return $this->city;
	}
	public function getCitiesCourier()
    {
        return $this->get('CourierListCities');
    }
    public function getPrice($params)
    {
        return $this->get('DeliveryCosts', $params);
    }
    public function getPointsPyZip($index)
    {
	    return $this->get('PointsByPostCode', ['zip' => $index]);
    }
}