<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ShopCharVal */

$this->title = 'Update Shop Char Val: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shop Char Vals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shop-char-val-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
