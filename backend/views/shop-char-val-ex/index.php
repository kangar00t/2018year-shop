<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Значения характеристик товара';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-char-val-ex-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'char_id',
            'val',
            'url_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>