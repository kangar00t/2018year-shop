<div class="h-cart<?=$cart->count ? ' active':'';?>">
	<span class="hc-count"><?= $cart->count;?></span>
	<p class="hc-title">Корзина</p>
	<p class="hc-text"><?= $cart->count ? $cart->price. ' р.' :'Нет покупок';?></p>
</div>

<? if ($cart->count) : ?>
	<div class="h-cart-items">
		<?= $this->render('/shop/_mini-cart-items', ['cart' => $cart]);?>
	</div>
<? endif;?>