<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ShopItem */

$this->title = 'Редактировать товар: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Shop Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="shop-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
