<?php

use yii\helpers\Html;

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
    	<div class="col-md-3">
    		<?= $this->render('_filter', ['chars' => $chars, 'filter' => $filter]);?>
    	</div>
    	<div class="col-md-9">
    		<div class="row preview-item">
    			<?= $this->render('_preview-item', ['dataProvider' => $dataProvider]);?>
		    </div>
		</div>
    </div>
</div>
