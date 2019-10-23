<?
	use yii\helpers\Html;
	use yii\widgets\ListView;
	use yii\widgets\Pjax;
?>

<? Pjax::begin();?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'item'],
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_preview-item-one', ['model' => $model]);
    },
]) ?>
<? Pjax::end();?>