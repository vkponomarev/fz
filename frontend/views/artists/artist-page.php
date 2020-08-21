<?php

/* @var $this yii\web\View
 *
 * @var $artistData \common\components\artist\ArtistData
 * @var $albumsByArtist \common\components\albums\AlbumsByArtist
 * @var $songsByArtist \common\components\songs\SongsByArtist as array
 * @var $featuringByArtist \common\components\featuring\FeaturingByArtist
 * @var $genres \common\components\genres\GenresByArtist
 */
$songsByArtistTMP = $songsByArtist;
?>
<div class="row row-flex">

    <div>
        <?php if (file_exists('/files/artists/' . $artistData['first_letter'] . '/' . $artistData['photos'])): ?>
            <img class="artist-photo"
                 src="/files/artists/<?= $artistData['first_letter'] ?>/<?= $artistData['photos'] ?>"
                 width="200">
        <?php else: ?>
            <img class="artist-photo" src="/files/no-photo.png" width="200">
        <?php endif; ?>
    </div>
    <div>
        <span class="album-text"> <?= Yii::t('app', 'artist') ?></span>

        <h1 class="album-name"><?= $artistData['name'] ?></h1>

        <?php if ($genres): ?>
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
    <?= Yii::t('app', 'Listen to music') ?> <?= $artistData['name'] ?> <?= Yii::t('app', 'online') ?>
</h2>
<hr>

<?php foreach ($albumsByArtist as $album): ?>
    <br>
    <div class="row row-flex">

        <div>
            <?php if ($album['photos']): ?>
                <img class="artist-album-photo"
                     src="/files/albums/<?= $album['first_letter'] ?>/<?= $album['photos'] ?>"
                     width="200">
            <?php else: ?>
                <img class="artist-album-photo" src="/files/no-album-photo.png" width="200">
            <?php endif; ?>


        </div>
        <div>

            <a class="artist-album-name" href="/<?= Yii::$app->params['language']['current']['url'] ?>/albums/<?= $album['url'] ?>/">
                <?= $album['name'] ?>
            </a>
            <br>
            <span class="artist-album-year">
            <?= $album['year'] ?>
            </span>

            <ul class="songs-links">
                <?php foreach ($songsByArtist as $key => $song): ?>
                    <?php if ($song['m_albums_id'] == $album['id']): ?>

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

                            <a class="songs-li-a" href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                                <?= $song['name'] ?></a>

                            <?php if (isset($song['featuring'])): ?>
                                <?php $count = 0; ?>
                                &nbsp;<span class="songs-li-a">
                                (
                                    <?= Yii::t('app', 'feat.') ?>
                                    <?php foreach ($song['featuring'] as $feature): ?>
                                        <?php if ($count > 0): ?>
                                            ,<a class=""
                                                href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                                        <?php else: ?>
                                            <a class=""
                                               href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                                        <?php endif; ?>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>
                                    )
                                </span>
                            <?php endif; ?>
                        </li>
                        <?php unset($songsByArtist[$key]); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>


        </div>
    </div>
    <hr>
<?php endforeach; ?>


<br>
<?php if (count($songsByArtist) > 0): ?>
    <div>
        <?php if ($albumsByArtist): ?>
            <br>
            <a name="lyrics"></a><h2 class="header-2"><?= Yii::t('app', 'Other songs:') ?></h2>
            <hr>
        <?php endif; ?>
        <ul class="songs-links">
            <?php foreach ($songsByArtist as $song): ?>
                <?php if (!$song['m_albums_id']): ?>
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

                        <a class="songs-li-a" href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                            <?= $song['name'] ?> </a>
                        <?php if (isset($song['featuring'])): ?>
                            <?php $count = 0; ?>
                            &nbsp;<span class="songs-li-a">
                                (
                                    <?= Yii::t('app', 'feat.') ?>
                                <?php foreach ($song['featuring'] as $feature): ?>
                                    <?php if ($count > 0): ?>
                                        ,<a class=""
                                            href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                                    <?php else: ?>
                                        <a class=""
                                           href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                                    <?php endif; ?>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                                    )
                                </span>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <br><br>
    <hr>
<?php endif; ?>


<br>
<a name="lyrics"></a><h2 class="header-2"><?= Yii::t('app', 'Lyrics') ?> <?= $artistData['name'] ?></h2>
<hr>

<div class="row row-flex">

    <ul class="songs-links">
        <?php $count = 0; ?>
        <?php foreach ($songsByArtistTMP as $key => $song): ?>
            <?php $count++; ?>
            <li class="songs-li">

                    <span id="play-button" class="fa fa-file-text-o play-button">
                        </span>

                <?= $artistData['name'] ?>
                <span class="dash">-</span>
                <a class="songs-li-a" href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                    <?= $song['name'] ?> </a>
            </li>
            <?php if ($count > 11) break; ?>
        <?php endforeach; ?>
    </ul>

</div>

<br>
<a name="song-translations"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Songs translations') ?> <?= $artistData['name'] ?> <?= Yii::t('app', 'into English') ?>
</h2>
<hr>

<div class="row row-flex">

    <ul class="songs-links">
        <?php $count = 0; ?>
        <?php foreach ($songsByArtistTMP as $key => $song): ?>
            <?php $count++; ?>
            <li class="songs-li">
                <span id="play-button" class="fa fa-pencil-square play-button">
                </span>


                <?= $artistData['name'] ?>
                <span class="dash">-</span>
                <a class="songs-li-a" href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                    <?= $song['name'] ?> </a>
            </li>
            <?php if ($count > 11) break; ?>
        <?php endforeach; ?>
    </ul>

</div>


<br>
<a name="music-videos"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Music videos') ?> <?= $artistData['name'] ?> <?= Yii::t('app', 'watch online') ?>
</h2>
<hr>

<div class="row row-flex">

    <ul class="play-video-links">
        <?php $count = 0; ?>
        <?php foreach ($songsByArtistTMP as $key => $song): ?>
            <?php $count++; ?>
            <li class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12 play-video-li">
                <span id="play-button" class="fa fa-play-circle play-video-button"
                      onclick="showYoutubeModal(this)"
                      data-url="<?= $song['url_youtube'] ?>" data-backdrop="false">
                </span>
                <br>

                <?= $artistData['name'] ?> - <?= $song['name'] ?>
            </li>
            <?php if ($count > 11) break; ?>
        <?php endforeach; ?>
    </ul>

</div>




