<?php

/* @var $this yii\web\View
 * @var $songData \common\components\song\Song
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


<?php if ($translationByLanguage): ?>

    <?php if ($translationByLanguage['origin'] == 1): ?>

        <div class="row row-flex">

            <div class="col-xxs-12">
                <h2 class="song-text-title"><?= Yii::t('app', 'Song lyrics') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>


                <br>
                <div class="song-text">
                    <?= $songData['text'] ?>
                </div>

            </div>

        </div>
        <hr>
        <div class="row row-flex">

            <div class="col-xxs-12">
                <h2 class="song-text-title"><?= Yii::t('app', 'Song translations') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>

                <br>
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

            <div class="col-xxs-12 col-xs-6">
                <h2 class="song-text-title"><?= Yii::t('app', 'Song lyrics') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>


                <br>
                <div class="song-text">
                    <?= $songData['text'] ?>
                </div>

            </div>


            <div class="col-xxs-12 col-xs-6">
                <h2 class="song-text-title"><?= Yii::t('app', 'Song translation') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>

                <br>
                <div class="song-text">
                    <?= $translationByLanguage['text'] ?>
                </div>
            </div>

        </div>
        <hr>
        <div class="row row-flex">

            <div class="col-xxs-12">
                <h2 class="song-text-title"><?= Yii::t('app', 'Song translations') ?>
                    <?php if ($artistData): ?>
                        <?= $artistData['name'] ?> -
                    <?php endif; ?>
                    <?= $songData['name'] ?>
                </h2>

                <br>
                <div class="song-translations">

                    <?php foreach ($translationsByLanguages as $translation): ?>
                        <?php if ($translation['origin'] <> 1): ?>

                            <a class="song-translations-a"
                               title="<?= $translation['name'] ?> <?= Yii::t('app', 'translation') ?>"
                               href="/<?= $translation['url'] ?>/songs/<?= $songData['url'] ?>/"><?= $translation['name'] ?>
                            </a>

                        <?php endif; ?>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>

    <?php endif; ?>

<?php else: ?>

    <div class="row row-flex">

        <div class="col-xxs-12">
            <h2 class="song-text-title"><?= Yii::t('app', 'Song lyrics') ?>
                <?php if ($artistData): ?>
                    <?= $artistData['name'] ?> -
                <?php endif; ?>
                <?= $songData['name'] ?>
            </h2>


            <br>
            <div class="song-text">
                <?= $songData['text'] ?>
            </div>

        </div>

    </div>


<?php endif; ?>

