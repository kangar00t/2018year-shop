<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $reception_lap
 * @property string $delivery_lap
 * @property string $reception
 * @property string $pickup_point
 * @property string $courier_delivery
 * @property string $foreign_reception_returns
 * @property string $terminal
 * @property string $kladr
 * @property string $region
 * @property string $country_code
 * @property string $uniq_name
 * @property string $district
 * @property string $prefix
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'reception_lap', 'delivery_lap', 'reception', 'pickup_point', 'courier_delivery', 'foreign_reception_returns', 'terminal', 'kladr', 'region', 'country_code', 'uniq_name', 'district', 'prefix'], 'required'],
            [['code', 'reception_lap', 'delivery_lap', 'reception', 'pickup_point', 'courier_delivery', 'foreign_reception_returns', 'terminal', 'country_code', 'prefix'], 'string', 'max' => 32],
            [['name', 'kladr', 'region', 'uniq_name', 'district'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'reception_lap' => 'Reception Lap',
            'delivery_lap' => 'Delivery Lap',
            'reception' => 'Reception',
            'pickup_point' => 'Pickup Point',
            'courier_delivery' => 'Courier Delivery',
            'foreign_reception_returns' => 'Foreign Reception Returns',
            'terminal' => 'Terminal',
            'kladr' => 'Kladr',
            'region' => 'Region',
            'country_code' => 'Country Code',
            'uniq_name' => 'Uniq Name',
            'district' => 'District',
            'prefix' => 'Prefix',
        ];
    }

    /**
     * @param array $city
     * @return bool
     */
    public static function updateFromBoxberryApi($city)
    {
        $model = self::find()->where(['uniq_name' => $city['UniqName']])->one();
        if (!$model) {
            $model = new self();
        }
        $model->code = $city['Code'];
        $model->name = $city['Name'];
        $model->reception_lap = $city['ReceptionLaP'];
        $model->delivery_lap = $city['DeliveryLaP'];
        $model->reception = $city['Reception'];
        $model->pickup_point = $city['PickupPoint'];
        $model->courier_delivery = $city['CourierDelivery'];
        $model->foreign_reception_returns = $city['ForeignReceptionReturns'];
        $model->terminal = $city['Terminal'];
        $model->kladr = $city['Kladr'];
        $model->region = $city['Region'];
        $model->country_code = $city['CountryCode'];
        $model->uniq_name = $city['UniqName'];
        $model->district = $city['District'];
        $model->prefix = $city['Prefix'];

        return $model->save();
    }
}
