<div id="dostavka">
    <p class="title-second">Выберите способ доставки:</p>
    <?php if ($city->priceKur) : ?>
        <div>
            <input type="radio" name="dostavka" value="kur" />
            Доставка курьером "до двери" (<span class="cart-total"><?= $city->priceKur;?> р.</span>)
        </div>
    <?php endif; ?>
    <?php if ($city->price) : ?>
        <div>
            <input type="radio" name="dostavka" value="pvz" class="pvz-radio" />
            Доставка до пункта выдачи (<span class="cart-total"><?= $city->price;?> р.</span>)
        </div>
        <div class="pvz-cont"></div>
        <a href="#" onclick="boxberry.open(callback_function); return false">Выбрать ПВЗ</a>
        <div id="boxberry_map"></div>
    <?php endif; ?>
</div>