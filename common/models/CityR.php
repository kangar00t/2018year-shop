<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_boxberry".
 *
 * @property integer $id
 * @property integer $zone
 * @property string $name
 * @property string $region
 * @property integer $dost
 * @property integer $dost_kur
 */
class CityR extends \yii\db\ActiveRecord
{
    /**
     * @var CityRZone
     */
    private $_zone;
    /**
     * @var integer
     */
    private $price_dop = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_boxberry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone', 'name', 'region'], 'required'],
            [['zone', 'dost', 'dost_kur'], 'integer'],
            [['name', 'region'], 'string', 'max' => 32],
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
            'name' => 'Name',
            'region' => 'Region',
            'dost' => 'Dost',
            'dost_kur' => 'Dost Kur',
        ];
    }

    public function getZoneR()
    {
        if (!$this->_zone) {
            $this->_zone = $this->hasOne(CityRZone::className(), ['zone' => 'zone']);
        }
        return $this->_zone;
    }

    public function getPriceDop($index)
    {
        if ($index) {
            if (is_null($this->price_dop)) {
                $res = Yii::$app->db->createCommand('SELECT price FROM city_boxberry_zone_dop WHERE indexes LIKE "%' . $index . '%" LIMIT 1')
                    ->queryColumn();
                if (isset($res[0])) {
                    $this->price_dop = (int)$res[0];
                } else {
                    $this->price_dop = 0;
                }
            }
            return $this->price_dop;
        }
        return 0;
    }

    public function getPrice()
    {
        return ($this->zoneR ? $this->zoneR->price_dost : 700000) + ($this->price_dop ? $this->price_dop : 0);
    }

    public function getPriceKur()
    {
        return ($this->zoneR ? $this->zoneR->price_dost_kur : 700000) + ($this->price_dop ? $this->price_dop : 0);
    }
}
