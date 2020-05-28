<?php

/* @var $this yii\web\View
 *
 * @var $songByYoutube yii\web\View
 * @var $artistByPopularity yii\web\View
 * @var $albumsByPopularity yii\web\View
 * @var $songsByPopularity yii\web\View
 *
 */

//echo $pageText['title'];$songByYoutube
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

        <?php foreach ($artistByPopularity as $artist): ?>

            <a href="/<?= Yii::$app->language ?>/artists/<?= $artist['url']; ?>/"
               class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates-artists-main">
                <div class="plates-artists-outside">
                    <div class="plates-artists">
                        <?php if ($artist['photos'] == 'asdsds'): ?>
                            <p>
                                <img class="plates-artists-img"
                                     src="/files/artists/<?= $artist['first_letter'] ?>/<?= $artist['photos'] ?>"
                                     alt="<?= $artist['name'] ?>"
                                     width="200">
                            </p>
                        <?php endif; ?>
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
    <h2 class="main-page-h2"><?= Yii::t('app', 'Popular albums') ?></h2>
    <br><br>
    <div class="row row-flex">

        <?php foreach ($albumsByPopularity as $album): ?>

            <a href="/<?= Yii::$app->language ?>/albums/<?= $album['url']; ?>/"
               class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates-albums-main">
                <div class="plates-albums-outside">

                    <div class="plates-albums">
                        <p>
                            <img class="plates-img"
                                 src="/files/albums/<?= $album['first_letter'] ?>/<?= $album['photos'] ?>"
                                 alt="<?= $album['name'] ?>"
                                 width="210">

                        </p>

                        <p class="plates-albums-title"><?= $album['name']; ?>

                            <?php if ($album['year']): ?>
                                (<?= $album['year']; ?>)
                            <?php endif; ?>

                        </p>

                        <p class="plates-albums-artist-name"><?= $album['artistName']; ?>
                        </p>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <br><br><br><br>
    <h2 class="main-page-h2"><?= Yii::t('app', 'Popular songs') ?></h2>
    <br><br>
    <div class="row row-flex">
        <?php //(new \common\components\dump\Dump())->printR($songsByPopularity); ?>
        <?php foreach ($songsByPopularity as $songs): ?>

            <a href="/<?= Yii::$app->language ?>/songs/<?= $songs['url']; ?>/"
               class="col-lg-3 col-md-4 col-sm-6 col-xs-12 main-pages-extended">
                <div class="plates-songs-outside">

                    <div class="plates-songs">

                        <?php if ($songs['albumPhoto']): ?>
                            <p>
                                <img class="plates-songs-img"
                                     src="/files/albums/<?= $songs['albumFirstLetter'] ?>/<?= $songs['albumPhoto'] ?>"
                                     alt="<?= $songs['name'] ?>"
                                     width="100">

                            </p>
                        <?php endif; ?>

                        <?= $songs['name']; ?>
                        <p class="plates-songs-title">

                        </p>

                        <p class="plates-songs-artist-name"><?= $songs['artistName']; ?>
                        </p>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>


    <br><br><br><br>
<?php

/*
 *
<a href="/script/first-letter/">first-letter</a><br>
<a href="/script/artists/">artists</a><br>
<a href="/script/albums/">albums</a><br>


 *             <?php if ($songs['year']): ?>
                            (<?php// $songs['year']; ?>)
                        <?php endif; ?>
 * */

?>