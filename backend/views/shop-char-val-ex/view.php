<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ShopCharValEx */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Значения характеристик товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-char-val-ex-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить это значение характеристики товара и все связные данные?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'char_id',
            'val',
        ],
    ]) ?>

</div>
