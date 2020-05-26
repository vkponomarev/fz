<?php

/* @var $this yii\web\View
 *
 * @var $artistData \common\components\artist\Artist
 * @var $albumData \common\components\album\Album
 * @var $songsByAlbum \common\components\songs\SongsByAlbum
 *
 */

//echo Yii::getAlias('@webroot');
?>

<div class="row row-flex">
    <div>
        <?php if (file_exists(Yii::getAlias('@webroot') . '/files/albums/' . $albumData['first_letter'] . '/' . $albumData['photos'])): ?>
            <img class="artist-album-photo"
                 src="/files/albums/<?= $albumData['first_letter'] ?>/<?= $albumData['photos'] ?>"
                 width="200">
        <?php else: ?>
            <img class="artist-album-photo" src="/files/no-album-photo.png" width="200">
        <?php endif; ?>
    </div>



    <div>
        <span class="album-text"> <?=Yii::t('app','album')?></span>

        <h1 class="album-name" ><?= $albumData['name'] ?> (<?= $albumData['year'] ?>)</h1>

        <?php if ($artistData): ?>
            <span class="album-text"> <?= Yii::t('app', 'artist') ?></span>
            <br>
            <a class="album-artist-link" href="/<?= Yii::$app->language ?>/artists/<?= $artistData['url'] ?>/">
                <?= $artistData['name'] ?>
            </a>
        <?php endif; ?>

        <div class="share-social">
            <?= $this->render('/partials/share-social/_share-social'); ?>
        </div>
    </div>
</div>

<hr>

<ul class="album-songs-links">
    <?php foreach ($songsByAlbum as $song): ?>
        <li>
        <a href="/<?= Yii::$app->language ?>/songs/<?= $song['url'] ?>/">
            <?= $song['name'] ?>
        </a>
        </li>

    <?php endforeach; ?>
</ul>
<br><br>



