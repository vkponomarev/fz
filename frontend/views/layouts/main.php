<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\widgets\Pjax;

AppAsset::register($this);
//echo $this->params['title'];

//Url::home();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Yii::$app->params['text']['title'] ?></title>

    <meta name="description" content="<?= Yii::$app->params['text']['description'] ?>">

    <?= $this->render('/partials/alternate/_alternate'); ?>

    <?= $this->render('/partials/canonical/_canonical'); ?>

    <?= $this->render('/partials/link-prev-next/_link-prev-next'); ?>
    <?php $this->registerCsrfMetaTags() ?>



    <?php $this->head() ?>

</head>
<body role="document">
<?php $this->beginBody() ?>

<div class="wrap">


    <div class="header-top-line">

        <?= $this->render('/partials/search/_search-widget', [
        ]); ?>

        <a href="/" rel="nofollow" class="header-top-line-site-name-link">FLOWLEZ</a>
    </div>


    <nav class="navbar-default header-nav-line">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed nav-button" data-toggle="collapse"
                    data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse nav-bar-collapsed ">

            <ul class="nav navbar-nav nav-bar-collapsed-ul">

                <li class="nav-link navbar-li">

                    <a href="/<?= Yii::$app->language ?>/artists/" class="dropdown-toggle navbar-a-link">

                        <?= Yii::t('app', 'Artists') ?>

                    </a>

                </li>

                <li class="navbar-separator">
                    |
                </li>


                <li class="dropdown navbar-li">
                    <a href="/<?= Yii::$app->language ?>/albums/" class="dropdown-toggle navbar-a-link">

                        <?= Yii::t('app', 'Albums') ?>

                    </a>
                </li>

                <li class="navbar-separator">
                    |
                </li>

                <li class="dropdown navbar-li">
                    <a href="/<?= Yii::$app->language ?>/songs/" class="dropdown-toggle navbar-a-link">

                        <?= Yii::t('app', 'Songs') ?>

                    </a>
                </li>

            </ul>

        </div>

    </nav>

    <div class="container">

        <?= $content ?>

    </div>

</div>
<div class="row">
    <div class="container">

        <?= $this->render('/partials/breadcrumbs/_breadcrumbs', [
            //'artist' => $artist,
        ]); ?>

    </div>
</div>
<footer>
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <?= $this->render('/partials/first-letter-index/_first-letter-index'); ?>
            </div>
        </div>


        <hr class="footer-hr">
        <div class="row text-md-left text-center">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <span class="choose-languages">

                   <span class="fa fa-globe globe-size">
                   </span>

                        <?= Yii::$app->params['currentLanguageName'] ?>

                   <span class="fa fa-sort-down sort-down-languages">
                   </span>
                   <ul class="languages-dropdown">


                       <?php foreach (Yii::$app->params['languageSelection'] as $item): ?>

                           <li>

                               <?= \yii\helpers\Html::a($item['name'], array_merge(Yii::$app->request->get(),
                                   [Yii::$app->controller->route, 'language' => $item['url']])); ?>

                           </li>

                       <?php endforeach ?>


                   </ul>

                </span>
                <span class="footer-brand">
                    <br><br>
                    &#169; Flowlez.com <br>
                </span>

                <span class="footer-brand-down-text">

                    <?= Yii::t('app', 'True way of music') ?>

                </span>


            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <ul class="contact">
                    <li>
                        <span><?= Yii::t('app', 'Read') ?></span>
                    </li>


                    <li>
                        <a href="/<?= Yii::$app->language ?>/cms/cookie/"
                           rel="nofollow"><?= Yii::t('app', 'Cookie info') ?></a>
                    </li>
                    <li>
                        <a href="/<?= Yii::$app->language ?>/cms/policy/"
                           rel="nofollow"><?= Yii::t('app', 'Privacy policy') ?></a>
                    </li>


                </ul>
            </div>


        </div>
    </div>
    <br><br><br>
</footer>

<script>

</script>
<?php Pjax::begin(); ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dbbf2586b540d45"></script>
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js" async="async"></script>

<?= $this->render('/partials/counters/_counters'); ?>



<?php Pjax::end(); ?>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
