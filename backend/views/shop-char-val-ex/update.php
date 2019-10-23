<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ShopCharValEx */

$this->title = 'Редактировать значение характеристики товара: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Значения характеристик товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="shop-char-val-ex-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'chars' => $chars,
    ]) ?>

</div>
