<?php

/* @var $this yii\web\View
 * @var $artistsByRandom \common\components\artists\ArtistsByRandom
 * @var $artistsByPopularity \common\components\artists\ArtistsByPopularity
 * @var $songByYoutube \common\components\artists\ArtistsByRandom
 */

//echo $pageText['title'];
?>

<br><br>

<a name="popular-artists"></a><h1 class="main-page-h1"><?= Yii::t('app', 'Popular artists') ?></h1>


<?php //echo print_r($item);?>
<br><br>

<div class="row row-flex">
    <?php foreach ($artistsByPopularity as $artist): ?>

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $artist['url']; ?>/"
           class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates-artists-main">
            <div class="plates-artists-outside">
                <div class="plates-artists">
                    <?php if ($artist['photos']=='asdsds'):?>
                        <p>
                            <img class="plates-artists-img"
                                 src="/files/artists/<?= $artist['first_letter'] ?>/<?= $artist['photos'] ?>"
                                 alt="<?= $artist['name'] ?>"
                                 width="200">
                        </p>
                    <?php endif;?>
                    <br><br><br><br>
                    <p class="plates-artists-title"><?= $artist['name']; ?></p>
                    <p class="plates-artists-under-title"><?php // $itemParent['short_description']; ?></p>
                    <br><br><br><br>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<br><br><br><br>



