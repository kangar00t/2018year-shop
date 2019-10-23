<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ShopCharVal */

$this->title = 'Create Shop Char Val';
$this->params['breadcrumbs'][] = ['label' => 'Shop Char Vals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-char-val-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
