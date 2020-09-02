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

<div class="rflex lyrics">

    <ul>
        <?php foreach ($songsByLyrics as $key => $song): ?>

            <li>
                    <span>
                        </span>

                <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $song['artistUrl'] ?>/">
                    <?= $song['artistName'] ?> </a>
                &nbsp;-&nbsp;
                <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                    <?= $song['name'] ?> </a>
            </li>

        <?php endforeach; ?>
    </ul>

</div>

<br><br><br><br>

<a name="song-translations"></a><h2 class="main-page-h1"><?= Yii::t('app', 'Song translations into English') ?></h2>
<br><br>
<div class="rflex translations">

    <ul>
        <?php foreach ($songsByTranslations as $key => $song): ?>

            <li>
                    <span>
                        </span>

                <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $song['artistUrl'] ?>/">
                    <?= $song['artistName'] ?> </a>
                &nbsp;-&nbsp;
                <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                    <?= $song['name'] ?> </a>
            </li>

        <?php endforeach; ?>
    </ul>

</div>




<br><br><br><br>
<a name="listen-songs"></a><h2 class="main-page-h1"><?= Yii::t('app', 'Listen to songs online for free') ?></h2>
<br><br>
<div class="rflex songs">
<ul>
    <?php foreach ($songsByListen as $song): ?>

        <li>
            <?php if ($song['url_youtube']): ?>
                <span onclick="sYM(this)"
                      data-url="<?= $song['url_youtube'] ?>">
                </span>
            <?php else: ?>
                <span class="false">
                </span>
            <?php endif; ?>
            <div>
            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $song['artistUrl'] ?>/">
                <?= $song['artistName'] ?> </a>
            &nbsp;-&nbsp;
            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                <?= $song['name'] ?> </a>
            </div>
        </li>

    <?php endforeach; ?>
</ul>
</div>

<br><br><br><br>
<a name="popular-songs"></a><h2 class="main-page-h2"><?= Yii::t('app', 'Popular songs') ?></h2>
<br><br>
<div class="rflex pop-songs">
    <?php //(new \common\components\dump\Dump())->printR($songsByPopularity); ?>
    <?php foreach ($songsByPopularity as $songs): ?>

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $songs['url']; ?>/"
           class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div>

                <div>

                    <?php if ($songs['albumPhoto']): ?>
                        <p>
                            <img
                                    src="/files/albums/<?= $songs['albumFirstLetter'] ?>/<?= $songs['albumPhoto'] ?>"
                                    alt="<?= $songs['name'] ?>"
                            >

                        </p>
                    <?php endif; ?>

                    <p><?= $songs['name']; ?></p>


                    <p class="plates-songs-artist-name"><?= $songs['artistName']; ?>
                    </p>

                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<br><br><br><br>
