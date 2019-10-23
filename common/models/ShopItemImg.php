<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_item_img}}".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $falename
 * @property integer $status
 */
class ShopItemImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_item_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'filename'], 'required'],
            [['item_id', 'status'], 'integer'],
            [['filename'], 'string', 'max' => 255],
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
            'filename' => 'Falename',
            'status' => 'Status',
        ];
    }
}
