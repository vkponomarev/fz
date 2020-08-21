<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 *
 * @var $songByYoutube yii\web\View
 * @var $artistByPopularity yii\web\View
 * @var $albumsByPopularity yii\web\View
 * @var $songsByPopularity yii\web\View
 * @var $songsByListenMusic common\components\songs\SongsByListenMusicMainPage
 */

//echo $pageText['title'];$songByYoutube
?>





<br><br>
<a name="listen-music"></a><h1 class="main-page-h1"><?= Yii::t('app', 'Listen to music online') ?></h1>
<br><br>

<div class="row row-flex">

    <ul class="songs-links">
        <?php foreach ($songsByListenMusic as $song): ?>

            <li class="songs-li">
                <?php if ($song['url_youtube']): ?>
                    <span id="play-button" class="fa fa-play-circle play-button" onclick="showYoutubeModal(this)" data-url="<?= $song['url_youtube'] ?>" data-backdrop="false">
                </span>
                <?php else: ?>
                    <span id="play-button" class="fa fa-play-circle play-button-false">
                </span>
                <?php endif; ?>
                <a class="songs-li-a" href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $song['artistUrl'] ?>/">
                    <?= $song['artistName'] ?> </a>
                <span class="dash">-</span>
                <a class="songs-li-a" href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                    <?= $song['name'] ?> </a>
            </li>

        <?php endforeach; ?>
    </ul>

</div>

<br><br><br><br>
<a name="popular-music"></a><h2 class="main-page-h2"><?= Yii::t('app', 'Popular music') ?></h2>


<?php //echo print_r($item);?>
<br><br>
<div class="row row-flex">

    <?php foreach ($artistByPopularity as $artist): ?>

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $artist['url']; ?>/"
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

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/albums/<?= $album['url']; ?>/"
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

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $songs['url']; ?>/"
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
