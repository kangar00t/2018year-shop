<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ShopCharValEx */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-char-val-ex-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'char_id')->dropDownList(ArrayHelper::map($chars, 'id', 'name'), ['prompt'=>'Выберите характеристику...']) ?>

    <?= $form->field($model, 'val')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
