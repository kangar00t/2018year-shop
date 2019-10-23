<?
	use yii\helpers\Html;
?>
<div class="col-md-4">
	<div id="product<?=$model->id;?>" class="shop-item">
	<a href="/shop/<?=$model->id;?>">
		<div class="img"><?=$model->imageHtml;?></div>
		<div class="title"><?=Html::encode($model->name);?></div>
		<div class="price"><?=$model->price;?> р.</div>
		<div class="shop-chars-block">
			<div class="age col-md-4">
				<div class="row minmax-block">
					<img src="/images/age-ico.png" /> <?=$model->minMaxText(6,7);?>
				</div>
			</div>
			<div class="chel col-md-4">
				<div class="row minmax-block">
					<span class="char-ico glyphicon glyphicon-user"></span> <?=$model->minMaxText(8,9);?>
				</div>
			</div>
			<div class="time col-md-4">
				<div class="row minmax-block">
					<span class="char-ico glyphicon glyphicon-time"></span> <?=$model->minMaxText(2,3);?>
				</div>
			</div>
		</div>
	</a>
		<div class="row">
			<input type="button" class="btn one-click gray-grad" data-id="<?=$model->id;?>"  value="Купить в 1 клик">
			<input type="button" class="btn to-cart" data-id="<?=$model->id;?>" value="В корзину">
		</div>
	</div>
</div>