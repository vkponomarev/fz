<?php

/* @var $this yii\web\View */


/**
 *
 */
$this->title = 'My Yii Application';
//echo $pageText['title'];
/*
'artistData' => $artistData,
'albumsData' => $albumsData,
'artistSongs' => $artistSongs,
*/
?>


<h1><?= $artistData['name']?></h1>

<?php foreach ($albumsData as $album):?>
    <?=  'Название альбома - ' . $album['name'] . '<br>' ?>
    <?php if ( $album['photos'] ):?>
        <img src="/files/albums/<?=$album['first_letter']?>/<?=$album['photos']?>">
    <?php  endif; ?>
    <br>
    <ul>
    <?php foreach ($artistSongs as $song):?>
        <?php if ($song['m_albums_id'] == $album['id']):?>
        <?=  '<li>' . $song['name'] . '</li>' ?>
        <?php  endif; ?>
    <?php endforeach;?>
    </ul>
    <br><br>



<?php endforeach;?>

<br>
Другие песни:
<ul>
    <?php foreach ($artistSongs as $song):?>
        <?php if (!$song['m_albums_id']):?>
            <?=  '<li>' . $song['name'] . '</li>' ?>
        <?php  endif; ?>
    <?php endforeach;?>
</ul>
<br><br>