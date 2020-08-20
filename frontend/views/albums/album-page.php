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


        <?php if ($genres): ?>
            <br>
            <span class="album-text"> <?= Yii::t('app', 'genres') ?></span>
            <?php $count = 0; ?>
            &nbsp;<span class="songs-li-a">
                    <?php foreach ($genres as $genre): ?>
                        <?php if ($count > 0): ?>
                            ,<span class="album-artist-link">
                                            <?= $genre['name'] ?></span>
                        <?php else: ?>
                            <span class="album-artist-link">
                                            <?= $genre['name'] ?></span>
                        <?php endif; ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>

                                </span>
        <?php endif; ?>


        <div class="share-social">
            <?= $this->render('/partials/share-social/_share-social'); ?>
        </div>
    </div>
</div>

<hr>
<br>
<a name="listen"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Listen to music') ?> <?= $artistData['name'] ?> - <?= $albumData['name'] ?> (<?= $albumData['year'] ?>) <?= Yii::t('app', 'online') ?>
</h2>
<hr>
<ul class="songs-links">
    <?php foreach ($songsByAlbum as $song): ?>

        <li class="songs-li-artists">
            <?php if ($song['url_youtube']): ?>
                <span id="play-button" class="fa fa-play-circle play-button"
                      onclick="showYoutubeModal(this)"
                      data-url="<?= $song['url_youtube'] ?>" data-backdrop="false">
                                </span>
            <?php else: ?>
                <span id="play-button" class="fa fa-play-circle play-button-false">
                                </span>
            <?php endif; ?>

            <a class="songs-li-a" href="/<?= Yii::$app->language ?>/songs/<?= $song['url'] ?>/">
                <?= $song['name'] ?> </a>

            <?php if (isset($song['featuring'])): ?>
                <?php $count = 0; ?>
                &nbsp;<span class="songs-li-a">
                                (
                                    <?= Yii::t('app', 'feat.') ?>
                    <?php foreach ($song['featuring'] as $feature): ?>
                        <?php if ($count > 0): ?>
                            ,<a class=""
                                href="/<?= Yii::$app->language ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                        <?php else: ?>
                            <a class=""
                               href="/<?= Yii::$app->language ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                        <?php endif; ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                                    )
                                </span>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>


<?= $this->render('/partials/modal/_modal-youtube', [
]); ?>



