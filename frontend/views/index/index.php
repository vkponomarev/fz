<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
//echo $pageText['title'];
//$artistsIndexLinksAll
?>

<div class="container container-no-top-padding-extended text-center text-md-left">


    <div class="row text-center footer-num-line">

        <?php foreach ($artistsIndexLinksAll as $eachLink): ?>

            <a href="/<?= Yii::$app->language ?>/artists/index/<?= $eachLink['url'] ?>/" class="artists-index-link">
                <?= $eachLink['first_letter'] ?>
            </a>

        <?php endforeach;?>

    </div>
</div>


<?=$this->render('/partials/breadcrumbs/_artists-index-breadcrumbs',[

]);?>