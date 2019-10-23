<? //var_dump($filter); ?>
<? foreach ($chars as $i => $char) : ?>
	<div class="char-box char-box-<?=$char->id;?><?=($i<99)?' active':'';?>" data-multi="<?=$char->multi;?>" data-type="<?=$char->type;?>" data-char="<?=$char->id;?>" >
		
		<div class="f-label">
			<?=$char->name;?>
			<!-- <span class="glyphicon glyphicon-chevron-down"></span>
			<span class="glyphicon glyphicon-chevron-up"></span> -->
		</div>
		<? if ($char->type == 1) : ?>

			<? foreach ($char->charValEx as $charVal) : ?>
				<? if ($char->multi) : ?>
					<div class="char-val-box">
						<input type="checkbox" <?= (isset($filter[$char->id]) && in_array($charVal->id, $filter[$char->id])) ? 'class="char-val checked" checked="checked"' : 'class="char-val"';?>  value="<?=$charVal->id;?>">
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
			<div class="char-val-box">
				<input type="text" class="char-val" value="<?= isset($filter[$char->id]) ? $filter[$char->id]:'';?>">
			</div>
		<? endif; ?>
	</div>
<? endforeach;?>
<hr>
<input type="button" value="Показать" class="filter-btn btn btn-success">

<div class="filter-res"></div>

<?php $this->registerJsFile('js/filter.js', ['depends' => ['yii\web\JqueryAsset', 'yii\bootstrap\BootstrapAsset']]);?>