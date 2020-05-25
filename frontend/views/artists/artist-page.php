<?php

/* @var $this yii\web\View
 *
 * @var $artistData \common\components\artist\ArtistData
 * @var $albumsByArtist \common\components\albums\AlbumsByArtist
 * @var $songsByArtist \common\components\songs\SongsByArtist as array
 *
 */

$this->title = 'My Yii Application';
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
    </div>

</div>

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
                <img class="artist-album-photo" src="/files/no-albums-photo.png" width="200">
            <?php endif; ?>


        </div>
        <div>

            <a class="artist-album-name" href="/<?= Yii::$app->language ?>/albums/<?= $album['url'] ?>/">
                <?= $album['name'] ?>
            </a>
            <br>
            <span class="artist-album-year">
            <?= $album['year'] ?>
            </span>
            <br><br>
            <ul class="artist-songs-links">
                <?php foreach ($songsByArtist as $key => $song): ?>
                    <?php if ($song['m_albums_id'] == $album['id']): ?>
                        <li>
                            <a href="/<?= Yii::$app->language ?>/songs/<?= $song['url'] ?>/">
                                <?= $song['name'] ?>
                            </a>
                        </li>
                        <?php unset($songsByArtist[$key]); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>


        </div>
    </div>
    <br><br><br><br>
    <hr>
<?php endforeach; ?>


<br>
<?php if (count($songsByArtist) > 0): ?>
    <div>
        <span class="artist-album-name">
            <?= Yii::t('appa', 'Other songs:') ?>
        </span>
        <br><br>

        <ul class="artist-other-songs-links">
            <?php foreach ($songsByArtist as $song): ?>
                <?php if (!$song['m_albums_id']): ?>
                    <li>
                        <a href="/<?= Yii::$app->language ?>/songs/<?= $song['url'] ?>/">
                            <?= $song['name'] ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <br><br>
    <hr>
<?php endif; ?>

