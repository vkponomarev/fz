<?php

/* @var $this yii\web\View
 *
 * @var $indexesByArtistsFirstLetter
 *
 */

$this->title = 'My Yii Application';
//echo $pageText['title'];
//$artistsIndexLinksAll
?>
<h1 class="main-page-h2"> <?= Yii::$app->params['text']['h1'] ?></h1>


<div class="container container-no-top-padding-extended text-center text-md-left">


    <div class="row text-center footer-num-line">

        <?php foreach ($indexesByArtistsFirstLetter as $eachLink): ?>

            <a href="/<?= Yii::$app->language ?>/artists/index/<?= $eachLink['url'] ?>/" class="artists-index-link">
                <?= $eachLink['first_letter'] ?>
            </a>

        <?php endforeach;?>

    </div>
</div>
