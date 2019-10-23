<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_vendor',
            'id_type',
            'name',
            'f_name',
            // 'price',
            // 'price_sale',
            // 'descr2',
            // 'freq',
            // 'created',
            // 'page',
            // 'foto',
            // 'rule',
            // 'hidden',
            // 'title',
            // 'description',
            // 'keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
