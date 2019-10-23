<?php
	use kartik\file\FileInput;
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Json;
	use yii\helpers\Url;

	$this->title = 'Импорт';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
	<?php
		$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

		echo $form->field($model, 'excelFiles[]')->widget(FileInput::classname(), [
		    'language' => 'ru',
		    'options'=>[
		        'multiple'=>true
		    ],
		    'pluginOptions' => [
		        'uploadUrl' => Url::to(['/site/upload']),
		        'maxFileCount' => 16,
		        'maxFileSize'=>20000,
		    ],
		]);
		ActiveForm::end();
	?>
</div>
