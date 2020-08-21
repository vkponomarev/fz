<?php

/* @var $this yii\web\View
 * @var $songByYoutube \common\components\song\SongByYoutube
 * @var $songsByPopularity \common\components\songs\SongsByPopularity
 * @var $songsByLyrics \common\components\songs\SongsByLyrics
 * @var $songsByTranslations \common\components\songs\SongsByTranslations
 * @var $songsByListen \common\components\songs\SongsByListen
 */

//echo $pageText['title'];$songByYoutube
?>

<br><br>

<a name="lyrics"></a><h1 class="main-page-h1"><?= Yii::t('app', 'Lyrics') ?></h1>
<br><br>

<div class="row row-flex">

    <ul class="songs-links">
        <?php foreach ($songsByLyrics as $key => $song): ?>

            <li class="songs-li">
                    <span id="play-button" class="fa fa-file-text-o play-button">
                        </span>

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

<a name="song-translations"></a><h2 class="main-page-h1"><?= Yii::t('app', 'Song translations into English') ?></h2>
<br><br>
<div class="row row-flex">

    <ul class="songs-links">
        <?php foreach ($songsByTranslations as $key => $song): ?>

            <li class="songs-li">
                    <span id="play-button" class="fa fa-pencil-square play-button">
                        </span>

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
<a name="listen-songs"></a><h2 class="main-page-h1"><?= Yii::t('app', 'Listen to songs online for free') ?></h2>
<br><br>

<ul class="songs-links">
    <?php foreach ($songsByListen as $song): ?>

        <li class="songs-li">
            <?php if ($song['url_youtube']): ?>
                <span id="play-button" class="fa fa-play-circle play-button" onclick="showYoutubeModal(this)"
                      data-url="<?= $song['url_youtube'] ?>" data-backdrop="false">
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


<br><br><br><br>
<a name="popular-songs"></a><h2 class="main-page-h2"><?= Yii::t('app', 'Popular songs') ?></h2>
<br><br>
<div class="row row-flex">
    <?php //(new \common\components\dump\Dump())->printR($songsByPopularity); ?>
    <?php foreach ($songsByPopularity as $songs): ?>

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $songs['url']; ?>/"
           class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-12 main-pages-extended">
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
