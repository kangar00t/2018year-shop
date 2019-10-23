<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ShopCharValEx */

$this->title = 'Добавить новое значение характеристики товара';
$this->params['breadcrumbs'][] = ['label' => 'Значения характеристик товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-char-val-ex-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'chars' => $chars,
    ]) ?>

</div>
