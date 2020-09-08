<?php
/* @var $this \frontend\controllers\ArtistsController
 * @var $artistData \common\components\artist\ArtistData
 * @var $albumsByArtist \common\components\albums\AlbumsByArtist
 * @var $songsByArtist \common\components\songs\SongsByArtist as array
 * @var $featuringByArtist \common\components\featuring\FeaturingByArtist
 * @var $genres \common\components\genres\GenresByArtist
 * @var $translationCheckOrigin \common\components\translation\TranslationCheckOrigin
 */
$songsByArtistTMP = $songsByArtist;
?>
<div class="rflex artist">

    <div>
        <?php if (file_exists('/files/artists/' . $artistData['first_letter'] . '/' . $artistData['photos'])): ?>
            <img src="/files/artists/<?= $artistData['first_letter'] ?>/<?= $artistData['photos'] ?>"
                 alt="<?= $artistData['name'] ?>"
            >
        <?php else: ?>
            <img src="/files/no-photo.png"
                 alt="<?= $artistData['name'] ?>"
            >
        <?php endif; ?>
    </div>
    <div>
        <div>
            <span><?= Yii::t('app', 'artist') ?></span>

            <h1><?= $artistData['name'] ?></h1>
        </div>

        <?php if ($genres): ?>
            <div>
                <span><?= Yii::t('app', 'genres') ?></span>
                <?php $count = 0; ?>
                <div>
                    <?php foreach ($genres as $genre): ?>
                        <?php if ($count > 0): ?>
                            ,<?= ' '; ?>
                            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/genres/<?= $genre['url'] ?>/"><?= $genre['name'] ?></a>
                        <?php else: ?>
                            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/genres/<?= $genre['url'] ?>/"><?= $genre['name'] ?></a>
                        <?php endif; ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div>
            <?= Yii::$app->view->render('@frontend/views/partials/share-social/_share-social.min.php'); ?>
        </div>
    </div>

</div>

<hr>
<br>
<a name="listen"></a>
<h2>
    <?= Yii::t('app', 'Listen to music') ?><?= ' '; ?><?= $artistData['name'] ?><?= ' '; ?><?= Yii::t('app', 'online') ?>
</h2>
<hr>

<?php foreach ($albumsByArtist as $album): ?>
    <br>
    <div class="rflex album">
        <div>
            <?php if ($album['photos']): ?>
                <img src="/files/albums/<?= $album['first_letter'] ?>/<?= $album['photos'] ?>"
                     alt="<?= $artistData['name'] . ' - ' ?><?= $album['name'] ?><?php if ($album['year']) echo ' (' . $album['year'] . ')' ?>"
                >
            <?php else: ?>
                <img src="/files/no-album-photo.png"
                     alt="<?= $artistData['name'] . ' - ' ?><?= $album['name'] ?><?php if ($album['year']) echo ' (' . $album['year'] . ')' ?>"
                >
            <?php endif; ?>
        </div>
        <div>
            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/albums/<?= $album['url'] ?>/">
                <?= $album['name'] ?>
            </a>
            <br>
            <span>
                <?php if ($album['year']): ?>
                    <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/years/<?= $album['mYearUrl'] ?>/">
                <?= $album['year'] ?>
            </a>
                <?php endif; ?>

            </span>
            <ul>
                <?php foreach ($songsByArtist as $key => $song): ?>
                    <?php if ($song['m_albums_id'] == $album['id']): ?>
                        <li>
                            <?php if ($song['url_youtube']): ?>
                                <span onclick="sYM(this)" data-url="<?= $song['url_youtube'] ?>">
                                </span>
                            <?php else: ?>
                                <span class="false">
                                </span>
                            <?php endif; ?>

                            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                                <?= $song['name'] ?></a><?= ' '; ?>
                            <?php if (isset($song['featuring'])): ?>

                                <?php $count = 0; ?>
                                <div>
                                    (<?= Yii::t('app', 'feat.') ?><?= ' '; ?>
                                    <?php foreach ($song['featuring'] as $feature): ?>
                                        <?php if ($count > 0): ?>
                                            ,<?= ' '; ?><a
                                            href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                                        <?php else: ?>
                                            <a
                                                    href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                                <?= $feature['name'] ?></a>
                                        <?php endif; ?>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>)
                                </div>
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

    <?php if ($albumsByArtist): ?>
        <br>
        <a name="other-songs"></a><h2><?= Yii::t('app', 'Other songs:') ?></h2>
        <hr>
    <?php endif; ?>
    <div class="rflex album">
        <div>
            <ul>
                <?php foreach ($songsByArtist as $song): ?>
                    <?php if (!$song['m_albums_id']): ?>
                        <li>
                            <?php if ($song['url_youtube']): ?>
                                <span
                                        onclick="sYM(this)"
                                        data-url="<?= $song['url_youtube'] ?>">
                                </span>
                            <?php else: ?>
                                <span class="false">
                                </span>
                            <?php endif; ?>

                            <a
                                    href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                                <?= $song['name'] ?> </a>
                            <?php if (isset($song['featuring'])): ?>
                                <?php $count = 0; ?>

                                <div>
                                    (<?= Yii::t('app', 'feat.') ?><?= ' '; ?>
                                    <?php foreach ($song['featuring'] as $feature): ?>
                                        <?php if ($count > 0): ?>
                                            ,<?= ' '; ?><a
                                            href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                            <?= $feature['name'] ?></a>
                                        <?php else: ?>
                                            <a
                                                    href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $feature['url'] ?>/">
                                                <?= $feature['name'] ?></a>
                                        <?php endif; ?>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>
                                    )
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <br><br>
    <hr>
<?php endif; ?>


<br>
<a name="lyrics"></a><h2><?= Yii::t('app', 'Lyrics') ?><?= ' '; ?><?= $artistData['name'] ?></h2>
<hr>

<div class="rflex lyrics">
    <ul>
        <?php $count = 0; ?>
        <?php foreach ($songsByArtistTMP as $key => $song): ?>
            <?php $count++; ?>
            <li>
                <span></span>
                <div>
                    <?= $artistData['name'] ?><?= ' '; ?>-<?= ' '; ?><a
                            href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                        <?= $song['name'] ?> </a>
                </div>
            </li>
            <?php if ($count > 11) break; ?>
        <?php endforeach; ?>
    </ul>
</div>

<?php if (!$translationCheckOrigin): ?>
    <br>
    <a name="translations"></a>
    <h2>
        <?= Yii::t('app', 'Songs translations') ?><?= ' '; ?><?= $artistData['name'] ?><?= ' '; ?><?= Yii::t('app', 'into English') ?>
    </h2>
    <hr>

    <div class="rflex translations">

        <ul>
            <?php $count = 0; ?>
            <?php foreach ($songsByArtistTMP as $key => $song): ?>
                <?php $count++; ?>
                <li>
                <span>
                </span>

                    <div>
                        <?= $artistData['name'] ?><?= ' '; ?>-<?= ' '; ?>
                        <a
                                href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                            <?= $song['name'] ?> </a>
                    </div>
                </li>
                <?php if ($count > 11) break; ?>
            <?php endforeach; ?>
        </ul>

    </div>

<?php endif; ?>

<br>
<a name="music-videos"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Music videos') ?><?= ' '; ?><?= $artistData['name'] ?><?= ' '; ?><?= Yii::t('app', 'watch online') ?>
</h2>
<hr>

<div class="rflex videos">

    <ul>
        <?php $count = 0; ?>
        <?php foreach ($songsByArtistTMP as $key => $song): ?>
            <?php $count++; ?>
            <li>
                <?php if ($song['url_youtube']): ?>
                    <span onclick="sYM(this)" data-url="<?= $song['url_youtube'] ?>">
                                </span>
                <?php else: ?>
                    <span class="false">
                                </span>
                <?php endif; ?>

                <br>
                <div>
                    <?= $artistData['name'] ?><?= ' '; ?>-<?= ' '; ?><?= $song['name'] ?>
                </div>
            </li>
            <?php if ($count > 11) break; ?>
        <?php endforeach; ?>
    </ul>

</div>