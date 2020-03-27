<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
//echo $pageText['title'];

/*
 *
 *             <?php if ($breadcrumbs['level3url']<>'health-2' and ($breadcrumbs['level3url'])): ?>
                <?php $position++; ?>

                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    /  <a href="/<?= Yii::$app->language ?>/health/<?=$breadcrumbs['level3url']?>/" itemprop="item">
                                    <span itemprop="name">
                                        <?=$breadcrumbs['level3pt']?>
                                    </span>
                    </a>
                    <meta itemprop="position" content="<?= $position ?>" />
                </li>
            <?php endif;?>

            <?php if ($breadcrumbs['level2url']<>'health-2' and ($breadcrumbs['level2url'])): ?>
                <?php $position++; ?>

                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    /  <a href="/<?= Yii::$app->language ?>/health/<?=$breadcrumbs['level2url']?>/" itemprop="item">
                                    <span itemprop="name">
                                        <?=$breadcrumbs['level2pt']?>
                                    </span>
                    </a>
                    <meta itemprop="position" content="<?= $position ?>" />
                </li>
            <?php endif;?>


            <?php if ($breadcrumbs['level1url']<>'health-2' and ($breadcrumbs['level1url'])): ?>
                <?php $position++; ?>

                <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
                    itemtype="http://schema.org/ListItem">
                    /  <a href="/<?= Yii::$app->language ?>/health/<?=$breadcrumbs['level1url']?>/" itemprop="item">
                                    <span itemprop="name">
                                        <?=$breadcrumbs['level1pt']?>
                                    </span>
                    </a>
                    <meta itemprop="position" content="<?= $position ?>" />
                </li>
            <?php endif;?>

 * */


?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=Yii::t('app', 'Congratulations')?></h1>

        <a href="<?= Yii::$app->language ?>/"> Главная </a>
        <a href="<?= Yii::$app->language ?>/index/artists/"> Индекс </a>
        <a href="<?= Yii::$app->language ?>/index/artists/h-30/"> H </a>
         Artist Name



        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
        <div class="row">




        </div>

    </div>
</div>



<?=$this->render('/partials/breadcrumbs/_artist_breadcrumbs',[
    'artist' => $artist,
    ]);?>