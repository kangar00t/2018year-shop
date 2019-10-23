<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ShopItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-item-view">
    <div class="item-detail">
        <div class="row">
            <div class="col-md-5 img-box">
                
                    <div class="preview-images" id="product<?=$model->id;?>">
                        <? foreach ($model->imagesHtml as $img) : ?>
                        <div class="dop-img">
                            <?=$img;?>
                        </div>
                        <? endforeach; ?>
                    </div>
                    <div class="preview-nav">
                        <? foreach ($model->imagesHtml as $img) : ?>
                        <div class="dop-img">
                            <?=$img;?>
                        </div>
                        <? endforeach; ?>
                    </div>
                
            </div>
            <div class="col-md-7">
                <h1><?= Html::encode($this->title) ?></h1>

                <div class="shop-chars-block">
                    <div class="age col-md-4">
                        <div class="row minmax-block">
                            <div>Рекомендуемый возраст:</div>
                            <img src="/images/age-ico.png" /> <?=$model->minMaxText(6,7);?>
                        </div>
                    </div>
                    <div class="chel col-md-4">
                        <div class="row minmax-block">
                            <div>Количество игроков:</div>
                            <span class="char-ico glyphicon glyphicon-user"></span> <?=$model->minMaxText(8,9);?>
                        </div>
                    </div>
                    <div class="time col-md-4">
                        <div class="row minmax-block">
                            <div>Длительность игры:</div>
                            <span class="char-ico glyphicon glyphicon-time"></span> <?=$model->minMaxText(2,3);?>
                        </div>
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="col-md-8">

                    <div class="price">
                    	<div class="row">
                    		<?=$model->price;?> р.
                    	</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 item-count">
                        	<div class="row ta-c">
	                            <span class="glyphicon glyphicon-minus item-minus gray-grad"></span>
	                            <input type="text" class="to-cart-count" value="1">
	                            <span class="glyphicon glyphicon-plus item-plus gray-grad"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="button" class="btn to-cart" data-id="<?=$model->id;?>"  value="В корзину">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row ta-c">
                                <spn class="glyphicon glyphicon-heart to-like gray-grad"></spn>
                                <spn class="glyphicon glyphicon-signal to-srav gray-grad"></spn>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="button" class="btn one-click gray-grad" value="Купить в 1 клик">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shop-chars-block row">
                        <div class="zhanr col-md-12">
                            <div class="row char-block">
                                <div class="title">Жанр:</div>
                                <? foreach ($model->zhanr as $char) : ?>
                                    <div class="char-val">
                                        <?= $char->valName;?>
                                    </div>
                                <? endforeach;?>
                            </div>
                        </div>
                        <div class="navyk col-md-12">
                            <div class="row char-block">
                                <div class="title">Навык:</div>
                                <? foreach ($model->navyk as $char) : ?>
                                    <div class="char-val">
                                        <?= $char->valName;?>
                                    </div>
                                <? endforeach;?>                            
                            </div>
                        </div>
                        <div class="situaciya col-md-12">
                            <div class="row char-block">
                                <div class="title">Ситуация:</div>
                                <? foreach ($model->situaciya as $char) : ?>
                                    <div class="char-val">
                                        <?= $char->valName;?>
                                    </div>
                                <? endforeach;?>
                            </div>
                        </div>
                        <div class="situaciya col-md-12">
                            <div class="row char-block">
                                <div class="title">Производитель:</div>
                                <div class="col-md-12">
                                	<?=$model->devName;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row item-desc">
        	<div class="col-md-6 col-md-offset-3">
        		<?=$model->descr2;?>
        	</div>
        </div>
    </div>
</div>

<?php $this->registerJsFile('/js/slick/slick.min.js', ['depends' => ['yii\web\JqueryAsset', 'yii\bootstrap\BootstrapAsset']]);?>
<?php $this->registerJsFile('/js/item-view.js', ['depends' => ['yii\web\JqueryAsset', 'yii\bootstrap\BootstrapAsset']]);?>