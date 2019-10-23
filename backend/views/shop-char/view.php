<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ShopChar */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Характеристики товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-char-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены, что хотите удалить характеристику и все значение этой характеристики у товаров?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'type',
            'status',
            'minmax',
        ],
    ]) ?>

</div>
