<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ShopItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товар', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены, что хотите удалить товар и все связные данные?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_vendor',
            'id_type',
            'name',
            'f_name',
            'price',
            'price_sale',
            'descr2',
            'freq',
            'created',
            'page',
            'foto',
            'rule',
            'hidden',
            'title',
            'description',
            'keywords',
        ],
    ]) ?>

</div>
