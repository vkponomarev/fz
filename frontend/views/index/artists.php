<?php

/* @var $this yii\web\View
 *
 * @var $indexesByArtistsFirstLetter
 *
 */

//echo $pageText['title'];
//$artistsIndexLinksAll
?>
<h1 class="main-page-h1"> <?= Yii::$app->params['text']['h1'] ?></h1>
<div class="rflex artists-index">
    <div>
        <?php foreach ($indexesByArtistsFirstLetter as $eachLink): ?>

            <a href="/<?= Yii::$app->language ?>/artists/index/<?= $eachLink['url'] ?>/">
                <?= $eachLink['first_letter'] ?>
            </a>

        <?php endforeach;?>
    </div>
</div>
