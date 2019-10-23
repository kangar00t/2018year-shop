<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_char_val_ex}}".
 *
 * @property integer $id
 * @property integer $char_val_id
 * @property string $val
 */
class ShopCharValEx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_char_val_ex}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['char_id', 'val', 'url_name'], 'required'],
            [['char_id'], 'integer'],
            [['val'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'char_id' => 'Характеристика',
            'val' => 'Значение',
            'url_name' => 'URL в фильтре',
        ];
    }

}
