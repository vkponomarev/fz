<?php

/* @var $this yii\web\View
 *
 * @var $artistData \common\components\artist\artist
 * @var $albumData \common\components\album\Album
 * @var $songsByAlbum \common\components\songs\SongsByAlbum
 *
 */


?>
<h1><?= $albumData['name'] ?> (<?= $albumData['year'] ?>)</h1>

<a href="/<?= Yii::$app->language ?>/artists/<?= $artistData['url'] ?>">
    <?= $artistData['name'] ?>
</a>
<br>
<br>
<?php if ($albumData['photos']): ?>
    <img src="/files/albums/<?= $albumData['first_letter'] ?>/<?= $albumData['photos'] ?>">
<?php endif; ?>
<br>
<ul>
    <?php foreach ($songsByAlbum as $song): ?>

        <a href="/<?= Yii::$app->language ?>/songs/<?= $song['url'] ?>">
            <?= $song['name'] ?>
        </a>
        <br>
    <?php endforeach; ?>
</ul>
<br><br>



