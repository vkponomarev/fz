<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
//echo $pageText['title'];
?>
<h1><?= $albumData['name'] ?></h1>

fwef
<a href="/<?= Yii::$app->language ?>/artists/<?= $artistData['url'] ?>">
    <?= $artistData['name'] ?>
</a>
<?= ' - ' . $albumData['name'] . '<br>' ?>
<br>
<?php if ($albumData['photos']): ?>
    <img src="/files/albums/<?= $albumData['first_letter'] ?>/<?= $albumData['photos'] ?>">
<?php endif; ?>
<br>
<ul>
    <?php foreach ($albumSongs as $song): ?>

        <?= '<li>' . $song['name'] . '</li>' ?>

    <?php endforeach; ?>
</ul>
<br><br>



