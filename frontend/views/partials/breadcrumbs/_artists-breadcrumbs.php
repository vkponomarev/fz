<?php

/* @var $this \yii\web\View */
/* @var $content string */




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

    <li class="breadcrumbs-item">
                <span >
                       / <?=Yii::t('app','Artists')?>
                </span>

    </li>

</ol>
