<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop_char_val".
 *
 * @property integer $id
 * @property integer $item_id
 * @property integer $char_id
 * @property string $val
 */
class ShopCharVal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_char_val';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'char_id', 'val'], 'required'],
            [['item_id', 'char_id', 'val'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'char_id' => 'Char ID',
            'val' => 'Val',
        ];
    }

    public function getChar()
    {
        return $this->hasOne(ShopChar::className(), ['id' => 'char_id']);
    }

    public function getValName()
    {
        if ($this->char->type == 1) {
            return ShopCharValEx::findOne($this->val)->val;
        }
        return $this->val;
    }
}
