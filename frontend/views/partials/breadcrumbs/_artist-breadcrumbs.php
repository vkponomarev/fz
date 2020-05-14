<?php

/* @var $this \yii\web\View */
/* @var $content string */


/*
 *
 *     <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
        itemtype="http://schema.org/ListItem">
        /  <a href="/<?= Yii::$app->language ?>/index/artists/<?= $artist->artist['url'] ?>/" itemprop="item">
                    <span itemprop="name">
                        <?= $artist->artist['first_letter'] ?>
                    </span>
        </a>
        <meta itemprop="position" content="4" />
    </li>

    <li class="breadcrumbs-item">
                <span >
                       / <?= $artist->artist['name'] ?>
                </span>

    </li>
 *
 * **/

?>

<ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">

    <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
        itemtype="http://schema.org/ListItem">
        <a href="/<?= Yii::$app->language ?>/" itemprop="item">
                        <span itemprop="name">
                        <?=Yii::t('app','Home')?>
                        </span>
        </a>
        <meta itemprop="position" content="1" />
    </li>

    <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
        itemtype="http://schema.org/ListItem">
        /  <a href="/<?= Yii::$app->language ?>/artists/" itemprop="item">
                    <span itemprop="name">
                        <?=Yii::t('app','Artists')?>
                    </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

    <li class="breadcrumbs-item" itemprop="itemListElement" itemscope
        itemtype="http://schema.org/ListItem">
        /  <a href="/<?= Yii::$app->language ?>/index/artists/" itemprop="item">
                    <span itemprop="name">
                        <?=Yii::t('app','Index')?>
                    </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>



</ol>
