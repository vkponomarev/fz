<?php

/* @var $this yii\web\View
 * @var $songData \common\components\song\Song
 * @var $albumData \common\components\album\Album
 * @var $artistData \common\components\artist\artist
 */
//(new \common\components\dump\Dump())->printR($albumData);


$this->title = 'My Yii Application';
?>


<div class="row row-flex">
    <div>
        <?php if ($albumData): ?>
            <?php if (file_exists(Yii::getAlias('@webroot') . '/files/albums/' . $albumData['first_letter'] . '/' . $albumData['photos'])): ?>
                <img class="artist-album-photo"
                     src="/files/albums/<?= $albumData['first_letter'] ?>/<?= $albumData['photos'] ?>"
                     width="200">
            <?php else: ?>
                <img class="artist-album-photo" src="/files/no-album-photo.png" width="200">
            <?php endif; ?>
        <?php else: ?>
            <img class="artist-album-photo" src="/files/no-album-photo.png" width="200">
        <?php endif; ?>
    </div>
    <div>
        <span class="album-text"><?= Yii::t('app', 'song') ?></span>


        <h1 class="album-name"><?= $songData['name'] ?></h1>
        <?php if ($albumData): ?>
            <span class="album-text"> <?= Yii::t('app', 'album') ?></span>
            <br>
            <a class="album-artist-link" href="/<?= Yii::$app->language ?>/albums/<?= $albumData['url'] ?>/">
                <?= $albumData['name'] ?>
            </a>

            <br>
        <?php endif; ?>

        <?php if ($artistData): ?>
            <span class="album-text"> <?= Yii::t('app', 'artist') ?></span>
            <br>
            <a class="album-artist-link" href="/<?= Yii::$app->language ?>/artists/<?= $artistData['url'] ?>/">
                <?= $artistData['name'] ?>
            </a>
        <?php endif; ?>

    </div>
</div>

<hr>

<div class="site-index">


    <h2 class="song-text-title"><?= Yii::t('app', 'Song lyrics') ?>
        <?php if ($artistData): ?>
            <?= $artistData['name'] ?> -
        <?php endif; ?>
        <?= $songData['name'] ?>
    </h2>


    <br>
    <br>
    <div class="song-text">
        <?= $songData['text'] ?>
    </div>
    <br>
</div>
