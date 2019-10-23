	<div class="ta-r">
		<input type="button" class="btn to-next gray-grad" value="Продолжить покупки">
		<a class="btn to-order" href="/cart">Оформить заказ</a>
	</div>
<? foreach ($cart->shopItems as $item) : ?>
	<div class="hc-item">
		<div class="hc-image"><?=$item['shopItem']->imageHtml;?></div>
		<div class="hc-name"><a href="/shop/<?=$item['shopItem']->id;?>"><?=$item['shopItem']->name;?></a></div>
		<div class="hc-count"><?=$item['count'];?></div>
		<div class="hc-price"><?=($item['shopItem']->price * $item['count']). 'р.';?></div>
		<div class="hc-btn">x</div>
	</div>
	<div class="clear"></div>
<? endforeach; ?>