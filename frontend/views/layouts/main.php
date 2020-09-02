<?php
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language ?>">
<head>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=Yii::$app->params['text']['title']?></title>

    <meta name="description" content="<?=Yii::$app->params['text']['description']?>">

    <?=$this->render('/partials/alternate/_alternate.min.php')?>

    <?=$this->render('/partials/canonical/_canonical.min.php')?>

    <?=$this->render('/partials/link-prev-next/_link-prev-next.min.php')?>
    <?php $this->registerCsrfMetaTags()?>
    <?php $this->head()?>


</head>
<body role="document">
<?php $this->beginBody()?>

<div class="wrap">


    <div class="top">

        <?=$this->render('/partials/search/_search-widget.min.php')?>

        <a href="/" rel="nofollow">FLOWLEZ</a>
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

                    <a href="/<?=Yii::$app->language?>/artists/" class="dropdown-toggle navbar-a-link">

                        <?=Yii::t('app', 'Artists')?>

                    </a>

                </li>

                <li class="navbar-separator">
                    |
                </li>


                <li class="dropdown navbar-li">
                    <a href="/<?=Yii::$app->language?>/albums/" class="dropdown-toggle navbar-a-link">

                        <?=Yii::t('app', 'Albums')?>

                    </a>
                </li>

                <li class="navbar-separator">
                    |
                </li>

                <li class="dropdown navbar-li">
                    <a href="/<?=Yii::$app->language?>/songs/" class="dropdown-toggle navbar-a-link">

                        <?=Yii::t('app', 'Songs')?>

                    </a>
                </li>

                <li class="navbar-separator">
                    |
                </li>

                <li class="dropdown navbar-li">
                    <a href="/<?=Yii::$app->language?>/genres/" class="dropdown-toggle navbar-a-link">

                        <?=Yii::t('app', 'Genres')?>

                    </a>
                </li>

               </ul>

        </div>

    </nav>

    <div class="container">

        <?=$content?>

    </div>

</div>


<div class="container">
    <div class="rflex">

        <?=$this->render('/partials/breadcrumbs/_breadcrumbs.min.php')?>

    </div>
</div>

<footer>
    <div class="container">

        <div class="rflex">
            <div>
                <br>
                <?=$this->render('/partials/first-letter-index/_first-letter-index.min.php')?>
            </div>
        </div>


        <hr>
        <div class="rflex fmy">

            <div class="col-xs-12 col-sm-6">
                <span class="cl">

                   <span class="fa fa-globe">
                   </span>

                        <?= Yii::$app->params['language']['current']['name']?>

                   <span class="fa fa-sort-down">
                   </span>
                   <ul>


                       <?php foreach (Yii::$app->params['language']['all'] as $item):?>

                           <li>

                               <?= \yii\helpers\Html::a($item['name'], array_merge(Yii::$app->request->get(), [Yii::$app->controller->route, 'language' => $item['url']]))?>

                           </li>

                       <?php endforeach?>


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

            <div class="col-xs-12 col-sm-6">

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

<?= $this->render('/partials/modal/_modal-youtube.min.php'); ?>

<script src="/js/addthis_widget.js#pubid=ra-5dbbf2586b540d45"></script>
<script src="/js/sharemin.js"></script>
<script src="/js/share.js"></script>

<?= $this->render('/partials/counters/_counters.min.php'); ?>




<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
