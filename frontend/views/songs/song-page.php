<?php

/* @var $this frontend\controllers\SongsController
 * @var $songData \common\components\song\Song
 * @var $songsData \common\components\songs\SongsByArtist
 * @var $albumData \common\components\album\Album
 * @var $artistData \common\components\artist\artist
 * @var $translationByLanguage \common\components\translation\Translation
 * @var $translationsByLanguages \common\components\translations\Translations
 */
//(new \common\components\dump\Dump())->printR($albumData);

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
            <span class="album-text"> <?= Yii::t('app', 'featuring') ?></span>

            <?php if (isset($featuring)): ?>
                <?php $count = 0; ?>
                &nbsp;<span class="songs-li-a">
                    <?php foreach ($featuring as $feature): ?>
                        <?php if ($count > 0): ?>
                            ,<a class="album-artist-link"
                                href="/<?= Yii::$app->language ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                        <?php else: ?>
                            <a class="album-artist-link"
                               href="/<?= Yii::$app->language ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                        <?php endif; ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>

                                </span>
            <?php endif; ?>

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
        <div class="share-social">
            <?= $this->render('/partials/share-social/_share-social'); ?>
        </div>
    </div>
</div>

<hr>
<br>
<a name="listen"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Listen to the song') ?> <?= $artistData['name'] ?>
    - <?= $songData['name'] ?> <?= Yii::t('app', 'online') ?>
</h2>
<hr>
<div class="row row-flex">
    <ul class="songs-links">
        <li class="songs-li-artists">
            <?php if ($songData['url_youtube']): ?>
                <span id="play-button" class="fa fa-play-circle play-button"
                      onclick="showYoutubeModal(this)"
                      data-url="<?= $songData['url_youtube'] ?>" data-backdrop="false">
                                </span>
            <?php else: ?>
                <span id="play-button" class="fa fa-play-circle play-button-false">
                                </span>
            <?php endif; ?>
            <span class="songs-li-a-song">
            <?= $artistData['name'] ?> - <?= $songData['name'] ?></span>
        </li>
    </ul>
</div>
<hr>
<br>
<?php if ($translationByLanguage): ?>
    <?php if ($translationByLanguage['origin'] == 1): ?>

        <div class="row row-flex">

            <div class="row col-xxs-12">
                <a name="lyrics"></a>
                <h2 class="header-2-song"><?= Yii::t('app', 'Song lyrics') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>


                <hr>
                <div class="song-text">
                    <?= $songData['text'] ?>
                </div>

            </div>

        </div>
        <hr>

        <div class="row row-flex">

            <div class="row col-xxs-12">
                <a name="translation"></a>
                <h2 class="header-translation-2"><?= Yii::t('app', 'Song translations') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>

                </h2>

                <hr>
                <div class="song-translations">

                    <?php foreach ($translationsByLanguages as $translation): ?>
                        <?php if ($translation['origin'] <> 1): ?>
                            <a class="song-translations-a"
                               title="<?= $translation['name'] ?> <?= Yii::t('app', 'translation') ?>"
                               href="/<?= $translation['url'] ?>/songs/<?= $songData['url'] ?>/">
                                <?= $translation['name'] ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    <?php else: ?>

        <div class="row row-flex">
            <div class="row col-xs-12 col-sm-6">
                <a name="lyrics"></a>
                <h2 class="header-2-song"><?= Yii::t('app', 'Song lyrics') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>
                <hr>
                <div class="song-text">
                    <?= $songData['text'] ?>
                </div>
            </div>


            <div class="row col-xs-12 col-sm-6">
                <a name="translation"></a>
                <h2 class="header-translation-2"><?= Yii::t('app', 'Song translation') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                    <?= Yii::t('app', 'into English') ?>
                </h2>
                <hr>
                <div class="song-text">
                    <?= $translationByLanguage['text'] ?>
                </div>
            </div>

        </div>
        <hr>
    <?php endif; ?>
<?php else: ?>
    <?php if ($songData['text']): ?>
        <div class="row row-flex">
            <div class="row col-xxs-12">
                <a name="lyrics"></a>
                <h2 class="header-2-song"><?= Yii::t('app', 'Song lyrics') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>
                <hr>
                <div class="song-text">
                    <?= $songData['text'] ?>
                </div>
            </div>
        </div>
        <hr>

    <?php endif; ?>
<?php endif; ?>


<br>
<a name="music-video"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Music video clip') ?> <?= $artistData['name'] ?> - <?= $songData['name'] ?> <?= Yii::t('app', 'watch online') ?>
</h2>
<hr>

<div class="row row-flex">
    <ul class="play-video-links">
            <li class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12 play-video-li">
                <span id="play-button" class="fa fa-play-circle play-video-button"
                      onclick="showYoutubeModal(this)"
                      data-url="<?= $songData['url_youtube'] ?>" data-backdrop="false">
                </span>
                <br>

                <?= $artistData['name'] ?> - <?= $songData['name'] ?>
            </li>
    </ul>
</div>



<br>
<a name="popular-songs"></a><h2 class="header-2"><?= Yii::t('app', 'Popular songs') ?> <?= $artistData['name'] ?></h2>
<hr>

<div class="row row-flex">

    <ul class="songs-links">
        <?php $count = 0; ?>
        <?php foreach ($songsData as $key => $song): ?>
            <?php $count++; ?>
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
                    <?= $artistData['name'] ?><span class="dash">-</span><a class="songs-li-a" href="/<?= Yii::$app->language ?>/songs/<?= $song['url'] ?>/">
                        <?= $song['name'] ?> </a>
                </li>
            <?php if ($count > 11) break; ?>
        <?php endforeach; ?>
    </ul>

</div>

<?= $this->render('/partials/modal/_modal-youtube', [
]); ?>
