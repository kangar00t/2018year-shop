<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_boxberry_zone".
 *
 * @property integer $id
 * @property integer $zone
 * @property integer $price_dost
 * @property integer $price_dost_kur
 * @property integer $price_kg
 */
class CityRZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_boxberry_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone', 'price_dost', 'price_dost_kur', 'price_kg'], 'required'],
            [['zone', 'price_dost', 'price_dost_kur', 'price_kg'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zone' => 'Zone',
            'price_dost' => 'Price Dost',
            'price_dost_kur' => 'Price Dost Kur',
            'price_kg' => 'Price Kg',
        ];
    }
}
