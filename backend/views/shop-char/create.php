<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ShopChar */

$this->title = 'Добавить характеристику товара';
$this->params['breadcrumbs'][] = ['label' => 'Характеристики товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-char-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
