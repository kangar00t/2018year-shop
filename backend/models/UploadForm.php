<?php
namespace app\models;

use yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $excelFiles;

    public function rules()
    {
        return [
            [['excelFiles'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 16],
        ];
    }
    
    public function upload($name)
    {
        if ($this->validate()) { 
            foreach ($this->excelFiles as $file) {
                $fname = $name . '.' . $file->extension;
                if ($file->saveAs( Yii::$app->params['uploaddir'] . $fname)) {
                    $model = new ImportFile();
                    $model->name = $file->name;
                    $model->filename = $fname;
                    $model->status = 1;
                    $model->save();
                }
                return $fname;
            }
            return true;
        } else {
            return $this->errors;
        }
    }
}
?>