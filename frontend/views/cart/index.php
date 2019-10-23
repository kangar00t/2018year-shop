<div class="row cart-block">
	<div class="col-md-6 col-md-offset-3">
		<div class="cart-item">

			<div class="row t-title">
		        <div class="col-md-7">
		        	Товар
		        </div>
		        <div class="col-md-2">
		        	Кол-во
		        </div>
		        <div class="col-md-2">
		        	Стоимость
		        </div>
		        <div class="col-md-1">
		        </div>
		    </div>
			<? foreach ($cart->shopItems as $item) : ?>
				<div class="row ci-box">
					<div class="ci-image col-md-2"><?=$item['shopItem']->imageHtml;?></div>
					<div class="ci-name col-md-5"><a href="/shop/<?=$item['shopItem']->id;?>"><?=$item['shopItem']->name;?></a></div>
					<div class="ci-count col-md-2"><?=$item['count'];?></div>
					<div class="ci-price col-md-2"><?=($item['shopItem']->price * $item['count']). ' р.';?></div>
					<div class="ci-btn col-md-1">x</div>
				</div>
				<div class="clear"></div>
			<? endforeach; ?>
			<div class="row cart-total">
				<div class="col-md-7 ta-r ct-text">
					Всего:
				</div>
		        <div class="col-md-2">
		        	<?=$cart->count;?> шт.
		        </div>
		        <div class="col-md-2">
		        	<?=$cart->price;?> р.
		        </div>
		    </div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="cart-form">
			<div class="col-md-4">
				<p class="title ta-c">Персональные данные</p>
				<p class="lbl">ФИО</p>
				<input type="text" class="pers-name" placeholder="Введите Ваше ФИО">
				<p class="lbl">Телефон</p>
				<input type="text" class="pers-phone" placeholder="Введите телефон для связи">
				<p class="lbl">E-Mail</p>
				<input type="text" class="pers-mail" placeholder="Введите Ваш e-mail">
			</div>
			<div class="col-md-8">
				<p class="title ta-c">Доставка</p>
				<p class="lbl">Адрес доставки</p>
				<input id="address" name="address" type="text" size="100" placeholder="Введите адрес доставки">
                <p class="lbl">Почтовый индекс</p>
                <input id="zip" name="zip" type="text" size="6" placeholder="Заполняется автоматически" disabled>
                <input type="hidden" id="cityName" value="" />
				<div class="dost-info"></div>
			</div>
			
			
		</div>
	</div>
</div>