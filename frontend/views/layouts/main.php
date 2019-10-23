<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use common\models\Cart;

AppAsset::register($this);
$this->title = 'Кроко.онлайн - магазин настольных игр и головоломок';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->registerJsFile('http://points.boxberry.ru/js/boxberry.js') ?>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Каталог игр',
        'brandUrl' => '/shop',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);


    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    ?>

	<form class="navbar-form navbar-right js-search-form" role="search">
	  <div class="form-group">
	    <input type="text" class="form-control js-search-data" placeholder="Введите название игры">
	  </div>
	  <button type="submit" class="btn gray-grad">Найти</button>
	</form>

    <?
    NavBar::end();
    ?>

    <div class="header">
        <div class="container">
            <div class="h-logo">
                <a href="/">
                    <img class="img-bgr" src="/images/main-logo.png" />
                    <img class="img-o1" src="/images/logo-o1.png" />
                    <img class="img-o2" src="/images/logo-o2.png" />
                    <p class="desc">Магазин настольных игр и головоломок</p>
                </a>
            </div>
            <div class="h-buttons">

            </div>
            <div class="mini-cart-block">
                <?= $this->render('/shop/_mini-cart', ['cart' => Yii::$app->cart]);?>
            </div>
        </div>
    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Kroko.online <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
