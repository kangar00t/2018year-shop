<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class FilterItem extends Model
{

    public $charVals;

    public function rules()
    {
        return [
        ];
    }

    public function attributeLabels()
    {
        return [
        ];
    }

    public function dump()
    {
        return '<pre>'.var_dump($this).'</pre>';
    }

}
