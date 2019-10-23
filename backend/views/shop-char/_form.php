<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ShopChar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-char-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([0 => 'Открытый', 1 => 'Выбрать из списка']);?>

    <?= $form->field($model, 'multi')->dropDownList([0 => 'Однозначный', 1 => 'Многозначный']);?>

    <?= $form->field($model, 'minmax')->dropDownList([0 => 'Точное совпадение', 1 => 'Минимальное значение', 2 => 'Максимальное значение']);?>

    <?= $form->field($model, 'minmax_type')->dropDownList([0 => 'Не применять', 1 => 'Ораничивать выборку этим значением', 2 => 'Включать в выборку эти значения']);?>

    <?= $form->field($model, 'status')->dropDownList([1 => 'Активен', 0 => 'Скрыт']);?>

    <?= $form->field($model, 'filter')->dropDownList([1 => 'Да', 0 => 'Нет']);?>

    <?= $form->field($model, 'sort')->textInput();?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
