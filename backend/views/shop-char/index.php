<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Характеристики товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-char-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить характеристику', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'name',
            'url_name',
            'type',
            'status',
            'filter',
            'sort',
            'minmax',
            'minmax_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
