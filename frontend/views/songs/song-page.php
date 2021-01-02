<?php

/* @var $this frontend\controllers\SongsController
 * @var $songData \common\components\song\Song
 * @var $songsData \common\components\songs\SongsByArtist
 * @var $albumData \common\components\album\Album
 * @var $artistBySong \common\components\artist\ArtistBySong
 * @var $yearBySong \common\components\year\YearBySong
 * @var $mLanguageBySong \common\components\mLanguage\MLanguageBySong
 * @var $translationByLanguage \common\components\translation\Translation
 * @var $translationsByLanguages \common\components\translations\Translations
 * @var $featuring \common\components\featuring\FeaturingBySong
 */

?>


<div class="rflex song-header">
    <div>

        <?php if ($albumData): ?>
            <?php if ($albumData['photos']): ?>
                <?php if (file_exists(Yii::getAlias('@frontend') . '/web/files/albums/' . $albumData['first_letter'] . '/' . $albumData['photos'])): ?>
                    <img
                            src="/files/albums/<?= $albumData['first_letter'] ?>/<?= $albumData['photos'] ?>"
                            alt="<?php if ($artistBySong['name']) echo $artistBySong['name'] . ' - ' ?><?= $albumData['name'] ?><?php if ($albumData['year']) echo ' (' . $albumData['year'] . ')' ?>"
                    >
                <?php else: ?>
                    <img src="/files/no-album-photo.png"
                         alt="<?php if ($artistBySong['name']) echo $artistBySong['name'] . ' - ' ?><?= $albumData['name'] ?><?php if ($albumData['year']) echo ' (' . $albumData['year'] . ')' ?>"
                    >
                <?php endif; ?>
            <?php else: ?>
                <img src="/files/no-album-photo.png"
                     alt="<?php if ($artistBySong['name']) echo $artistBySong['name'] . ' - ' ?><?= $albumData['name'] ?><?php if ($albumData['year']) echo ' (' . $albumData['year'] . ')' ?>"
                >
            <?php endif; ?>
        <?php else: ?>
            <img src="/files/no-album-photo.png"
                 alt="<?php if ($artistBySong['name']) echo $artistBySong['name'] . ' - ' ?><?= $albumData['name'] ?><?php if ($albumData['year']) echo ' (' . $albumData['year'] . ')' ?>"
            >
        <?php endif; ?>

    </div>
    <div>
        <div>
            <span><?= Yii::t('app', 'song') ?></span>


            <h1><?= $songData['name'] ?></h1>
        </div>
        <?php if ($albumData): ?>

            <?php if ($featuring): ?>
                <div>
                    <span> <?= Yii::t('app', 'featuring') ?></span>
                    <?php $count = 0; ?>
                    <div>
                        <?php foreach ($featuring as $feature): ?>
                            <?php if ($count > 0): ?>
                                ,<?= ' '; ?><a
                                href="/<?= Yii::$app->language ?>/artists/<?= $feature['url'] ?>/">
                                <?= $feature['name'] ?></a>
                            <?php else: ?>
                                <a
                                        href="/<?= Yii::$app->language ?>/artists/<?= $feature['url'] ?>/">
                                    <?= $feature['name'] ?></a>
                            <?php endif; ?>
                            <?php $count++; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            <?php endif; ?>
            <div>
                <span> <?= Yii::t('app', 'album') ?></span>
                <div>
                    <a href="/<?= Yii::$app->language ?>/albums/<?= $albumData['url'] ?>/">
                        <?= $albumData['name'] ?>
                    </a>
                </div>

            </div>
        <?php endif; ?>

        <?php if ($artistBySong): ?>
            <div>
                <span> <?= Yii::t('app', 'artist') ?></span>
                <div>
                    <a href="/<?= Yii::$app->language ?>/artists/<?= $artistBySong['url'] ?>/">
                        <?= $artistBySong['name'] ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($genres): ?>

            <div>
                <span> <?= Yii::t('app', 'genres') ?></span>
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

        <?php if (($mLanguageBySong) and $mLanguageBySong['main'] == 1): ?>
            <div>
                <span> <?= Yii::t('app', 'language') ?></span>
                <div>
                    <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/languages/<?= $mLanguageBySong['url'] ?>/"><?= $mLanguageBySong['name'] ?></a>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($yearBySong): ?>

            <div>
                <span> <?= Yii::t('app', 'year') ?></span>
                <div>
                    <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/years/<?= $yearBySong['url'] ?>/"><?= $yearBySong['name'] ?></a>
                </div>
            </div>
        <?php endif; ?>


        <div class="share-social">
            <?= Yii::$app->view->render('@frontend/views/partials/share-social/_share-social.min.php'); ?>
        </div>
    </div>
</div>

<hr>
<br>
<a name="listen"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Listen to the song') ?><?= ' '; ?><?php if ($artistBySong): ?>
        <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
    <?php endif; ?><?= ' '; ?><?= $songData['name'] ?><?= ' '; ?><?= Yii::t('app', 'online') ?>
</h2>
<hr>
<div class="rflex song">
    <ul>
        <li>
            <?php if ($songData['url_youtube']): ?>
                <span
                        onclick="sYM(this)"
                        data-url="<?= $songData['url_youtube'] ?>">
                                </span>
            <?php else: ?>
                <span class="false">
                                </span>
            <?php endif; ?>
            <div>
                <?php if ($artistBySong): ?>
                    <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
                <?php endif; ?><?= ' '; ?><?= $songData['name'] ?></div>
        </li>
    </ul>
</div>
<hr>
<br>
<?php // Если есть текст и нет перевода?>
<?php if (($songData['text']) and (!$translationByLanguage)): ?>
    <div class="rflex song-text">
        <div>
            <a name="lyrics"></a>

            <h2><?= Yii::t('app', 'Song lyrics') ?>
                <?php if ($artistBySong): ?>
                    <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
                <?php endif; ?>
                <?= ' '; ?><?= $songData['name'] ?>
            </h2>
            <hr>
            <?= \common\components\mainPagesData\MainPagesDataAdvertising::showAdvertising(2)?>
            <div>
                <?= $songData['text'] ?>
            </div>
        </div>
    </div>
    <hr>
<?php endif; ?>

<?php // Если есть текст Есть переводы и это НЕ оригинальный перевод?>
<?php if (($songData['text']) and ($translationByLanguage) and ($translationByLanguage['origin'] <> 1)): ?>
    <div class="rflex song-text-translation">
        <div class="col-xs-12 col-sm-6">
            <a name="lyrics"></a>

            <h2><?= Yii::t('app', 'Song lyrics') ?>
                <?php if ($artistBySong): ?>
                    <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
                <?php endif; ?>
                <?= ' '; ?><?= $songData['name'] ?>
            </h2>
            <hr>
            <?= \common\components\mainPagesData\MainPagesDataAdvertising::showAdvertising(2)?>
            <div class="song-text">
                <?= $songData['text'] ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 translation">
            <a name="translation"></a>
            <h2 class="header-translation-2"><?= Yii::t('app', 'Song translation') ?>
                <?php if ($artistBySong): ?>
                    <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
                <?php endif; ?>
                <?= ' '; ?><?= $songData['name'] ?>
                <?= ' '; ?><?= Yii::t('app', 'into English') ?>
            </h2>
            <hr>
            <?= \common\components\mainPagesData\MainPagesDataAdvertising::showAdvertising(3)?>
            <div class="song-text">
                <?= $translationByLanguage['text'] ?>
            </div>
        </div>

    </div>
    <hr>
<?php endif; ?>

<?php // Если есть текст Есть переводы и это оригинальный язык песни?>
<?php if (($songData['text']) and ($translationByLanguage['origin'] == 1)): ?>
    <div class="rflex song-text">
        <div>
            <a name="lyrics"></a>
            <h2><?= Yii::t('app', 'Song lyrics') ?>
                <?php if ($artistBySong): ?>
                    <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-<?= ' '; ?>
                <?php endif; ?>
                <?= ' '; ?><?= $songData['name'] ?>
            </h2>
            <hr>
            <?= \common\components\mainPagesData\MainPagesDataAdvertising::showAdvertising(2)?>
            <div>
                <?= $songData['text'] ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="rflex song-translations">

        <div>
            <a name="translations"></a>
            <h2><?= Yii::t('app', 'Song translations') ?>
                <?php if ($artistBySong): ?>
                    <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
                <?php endif; ?>
                <?= ' '; ?><?= $songData['name'] ?>

            </h2>

            <hr>
            <div>
                <?php $count = 0; ?>
                <?php foreach ($translationsByLanguages as $translation): ?>

                    <?php if ($translation['origin'] <> 1): ?>
                        <?php if ($count > 0): ?>
                            <?= ', '; ?>
                        <?php endif; ?>
                        <?php $count++ ?>
                        <a

                                href="/<?= $translation['url'] ?>/songs/<?= $songData['url'] ?>/">
                            <?= $translation['name'] ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>


            </div>
        </div>
    </div>

<?php endif; ?>

<br>
<a name="music-video"></a>
<h2 class="header-2">
    <?= Yii::t('app', 'Music video clip') ?><?= ' '; ?><?php if ($artistBySong): ?>
        <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
    <?php endif; ?><?= ' '; ?><?= $songData['name'] ?><?= ' '; ?><?= Yii::t('app', 'watch online') ?>
</h2>
<hr>

<div class="rflex video">
    <ul>
        <li>
            <?php if ($songData['url_youtube']): ?>
                <span
                        onclick="sYM(this)"
                        data-url="<?= $songData['url_youtube'] ?>">
                                </span>
            <?php else: ?>
                <span class="false">
                                </span>
            <?php endif; ?>
            <br>

            <?php if ($artistBySong): ?>
                <?= ' '; ?><?= $artistBySong['name'] ?><?= ' '; ?>-
            <?php endif; ?><?= ' '; ?><?= $songData['name'] ?>
        </li>
    </ul>
</div>
<?php if ($songsData): ?>
    <br>
    <a name="popular-songs"></a>
    <h2 class="header-2"><?= Yii::t('app', 'Popular songs') ?><?= ' '; ?><?= $artistBySong['name'] ?></h2>
    <hr>
    <div class="rflex songs">

        <ul>
            <?php $count = 0; ?>
            <?php foreach ($songsData as $key => $song): ?>
                <?php $count++; ?>
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
                    <div>
                        <?= $artistBySong['name'] ?><?= ' '; ?>-&nbsp;<a
                                href="/<?= Yii::$app->language ?>/songs/<?= $song['url'] ?>/">
                            <?= $song['name'] ?> </a>
                    </div>
                </li>
                <?php if ($count > 11) break; ?>
            <?php endforeach; ?>
        </ul>

    </div>
<?php endif; ?>



