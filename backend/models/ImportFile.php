<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%turnir_import_file}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $filename
 * @property string $date
 * @property integer $status
 */
class ImportFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%turnir_import_file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'filename', 'status'], 'required'],
            [['date'], 'safe'],
            [['status'], 'integer'],
            [['name', 'filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'filename' => 'Filename',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }
}
