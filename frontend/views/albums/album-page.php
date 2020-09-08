<?php

/* @var $this yii\web\View
 *
 * @var $artistByAlbum \common\components\artist\ArtistByAlbum
 * @var $albumData \common\components\album\Album
 * @var $songsByAlbum \common\components\songs\SongsByAlbum
 *
 */

//echo Yii::getAlias('@frontend');
//echo Yii::getAlias('@frontend') . '/web/files/albums/' . $albumData['first_letter'] . '/' . $albumData['photos'];
//die;
?>

<div class="rflex album-header">
    <div>
        <?php if ($albumData['photos']): ?>
            <?php if (file_exists(Yii::getAlias('@frontend') . '/web/files/albums/' . $albumData['first_letter'] . '/' . $albumData['photos'])): ?>
                <img src="/files/albums/<?= $albumData['first_letter'] ?>/<?= $albumData['photos'] ?>"
                     alt="<?php if ($artistByAlbum) echo $artistByAlbum['name'] . ' - ' ?><?= $albumData['name'] ?><?php if ($albumData['year']) echo ' (' . $albumData['year'] . ')' ?>">
            <?php else: ?>
                <img src="/files/no-album-photo.png"
                     alt="<?php if ($artistByAlbum) echo $artistByAlbum['name'] . ' - ' ?><?= $albumData['name'] ?><?php if ($albumData['year']) echo ' (' . $albumData['year'] . ')' ?>">
            <?php endif; ?>
        <?php else: ?>
            <img src="/files/no-album-photo.png"
                 alt="<?php if ($artistByAlbum) echo $artistByAlbum['name'] . ' - ' ?><?= $albumData['name'] ?><?php if ($albumData['year']) echo ' (' . $albumData['year'] . ')' ?>">
        <?php endif; ?>
    </div>

    <div>
        <div>
            <span><?= Yii::t('app', 'album') ?></span>
            <h1><?= $albumData['name'] ?><?= ' '; ?>(<?= $albumData['year'] ?>)</h1>
        </div>
        <?php if ($artistByAlbum): ?>
            <div>
                <span> <?= Yii::t('app', 'artist') ?></span>
                <br>
                <div>
                    <a
                            href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $artistByAlbum['url'] ?>/">
                        <?= $artistByAlbum['name'] ?>
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
                            ,
                            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/genres/<?= $genre['url'] ?>/"><?= $genre['name'] ?></a>
                        <?php else: ?>
                            <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/genres/<?= $genre['url'] ?>/"><?= $genre['name'] ?></a>
                        <?php endif; ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($albumData['year']): ?>
            <div>
                <span> <?= Yii::t('app', 'year') ?></span>
                <div>
                    <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/years/<?= $albumData['mYearUrl'] ?>/"><?= $albumData['year'] ?></a>
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
<h2>
    <?= Yii::t('app', 'Listen to music') ?><?= ' '; ?><?= $artistByAlbum['name'] ?><?= ' '; ?>
    -<?= ' '; ?><?= $albumData['name'] ?>
    <?php if ($albumData['year']): ?>
        <?= ' '; ?>
        (<?= $albumData['year'] ?>)
    <?php endif; ?>
    <?= ' '; ?>
    <?= Yii::t('app', 'online') ?>
</h2>
<hr>
<div class="rflex album-songs">
    <ul>
        <?php foreach ($songsByAlbum as $song): ?>
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
                        (
                        <?= Yii::t('app', 'feat.') ?><?= ' '; ?>
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
        <?php endforeach; ?>
    </ul>
</div>


