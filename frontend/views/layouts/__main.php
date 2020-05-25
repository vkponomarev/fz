<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;

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


    <meta name="description" content="<?= Yii::$app->params['text']['description'] ?>">
    <?= $this->render('/partials/link-prev-next/_link-prev-next'); ?>
    <?php $this->registerCsrfMetaTags() ?>


    <title><?= Yii::$app->params['text']['title'] ?></title>

    <?php $this->head() ?>

</head>
<body role="document">
<?php $this->beginBody() ?>

<div class="wrap">


    <div class="header-top-line">

        <a href="/" rel="nofollow" class="header-top-line-site-name-link">FLOWLEZ</a>

        <div class="header-top-line-sign-up">

            <a href="./" rel="nofollow" class="header-top-line-sign-up-link"><?= Yii::t('app', 'Sign in') ?></a>

        </div>
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





                <!---
                                <li class="dropdown navbar-li">
                                    <a  href="/" class="dropdown-toggle navbar-a-link" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="true">

                                        Переводы

                                         <span class="caret">
                                            </span>

                                    </a>


                                    <ul class="dropdown-menu dropdown-extended">

                                        <li class="show-only-small-resolution dropdown-li-extended">
                                            <a href="/"сlass="dropdown-li-a-extended">

                                                Артисты 1

                                            </a>
                                        </li>

                                        <li class="dropdown-li-extended">
                                            <a href="/" class="dropdown-li-a-extended">

                                                Артисты 12

                                            </a>
                                        </li>

                                    </ul>


                </li>
                --->

            </ul>

        </div>

    </nav>

    <div class="container">

        <?= $content ?>

    </div>

</div>
<div class="container">

    <?=$this->render('/partials/breadcrumbs/_breadcrumbs',[
        //'artist' => $artist,
    ]);?>

</div>
<footer>
    <div class="container  ">

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <?= $this->render('/partials/first-letter-index/_first-letter-index'); ?>
            </div>
        </div>


        <hr class="footer-hr">
        <div class="row text-md-left text-center" >

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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

                    The way of music

                </span>


            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <ul class="contact">
                    <span><?= Yii::t('app', 'Read') ?></span>

                    <li>
                        <a href="/<?= Yii::$app->language ?>/embed/"
                           rel="nofollow"><?= Yii::t('app', 'Embed calculator') ?></a>
                    </li>

                    <li>
                        <br>
                    </li>


                    <li>
                        <a href="/<?= Yii::$app->language ?>/cookie/"
                           rel="nofollow"><?= Yii::t('app', 'Cookie info') ?></a>
                    </li>
                    <li>
                        <a href="/<?= Yii::$app->language ?>/policy/"
                           rel="nofollow"><?= Yii::t('app', 'Privacy policy') ?></a>
                    </li>


                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <ul class="contact">
                    <span><?= Yii::t('app', 'Help') ?></span>
                    <li>
                        <a href="/<?= Yii::$app->language ?>/translation/"
                           rel="nofollow"><?= Yii::t('app', 'Translations') ?></a>
                    </li>
                    <li>
                        <a href="/<?= Yii::$app->language ?>/donation/"
                           rel="nofollow"><?= Yii::t('app', 'Donations') ?></a>
                    </li>


                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <ul class="contact">
                    <span><?= Yii::t('app', 'Contacts') ?></span>
                    <li>
                        <a href="/<?= Yii::$app->language ?>/contact/"
                           rel="nofollow"><?= Yii::t('app', 'Write to us') ?></a>
                    </li>

                </ul>
            </div>


        </div>
    </div>
    <br><br><br>
</footer>

<script>

</script>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
