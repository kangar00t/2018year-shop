<p class="shop-filter">Фильтр</p>
<? foreach ($chars as $char) : ?>
	<hr>
	<div class="f-label"><?=$char->name;?></div>
	<div class="char-box" data-multi="<?=$char->multi;?>" data-type="<?=$char->type;?>" data-char="<?=$char->id;?>" >
		<? if ($char->type == 1) : ?>

			<? foreach ($char->charValEx as $charVal) : ?>
				<? if ($char->multi) : ?>
					<div class="char-val-box">
						<input type="checkbox" class="char-val" value="<?=$charVal->id;?>">
						<label><?=$charVal->val;?></label>
					</div>
				<? else : ?>
					<div class="char-val-box">
						<input type="radio" class="char-val" name="char-id-<?=$char->id;?>" value="<?=$charVal->id;?>">
						<label><?=$charVal->val;?></label>
					</div>
				<? endif; ?>
			<? endforeach;?>

		<? else : ?>
			<input type="text" class="char-val">
		<? endif; ?>
	</div>
<? endforeach;?>
<hr>
<input type="button" value="Показать" class="filter-btn btn btn-success">

<div class="filter-res"></div>

<?php $this->registerJsFile('js/filter.js', ['depends' => ['yii\web\JqueryAsset', 'yii\bootstrap\BootstrapAsset']]);?>