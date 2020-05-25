<?php

/* @var $this yii\web\View
 * @var $artistsByRandom \common\components\artists\ArtistsByRandom
 * @var $artistsByPopularity \common\components\artists\ArtistsByRandom
 * @var $songByYoutube \common\components\artists\ArtistsByRandom
 */

$this->title = 'My Yii Application';
//echo $pageText['title'];
?>

<br><br><br>

<?= $this->render('/partials/youtube-player/youtube-player', [
    'songByYoutube' => $songByYoutube,
]); ?>


<br><br><br><br>

<h2 class="main-page-h2"><?= Yii::t('app', 'Popular artists') ?></h2>


<?php //echo print_r($item);?>
<br><br>

<div class="row row-flex">
<?php foreach ($artistsByPopularity as $artist): ?>

    <a href="/<?= Yii::$app->language ?>/artists/<?= $artist['url']; ?>/"
       class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-6 main-pages-extended">
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
            </div>
        </div>
    </a>
<?php endforeach; ?>
</div>

<br><br><br><br>
