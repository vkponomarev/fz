<?php

/* @var $this yii\web\View
 * @var $songByYoutube common\components\song\SongByYoutube
 * @var $albumsByPopularity common\components\albums\AlbumsByPopularity
 */

$this->title = 'My Yii Application';
//echo $pageText['title'];$songByYoutube
?>

    <br><br><br>

<?= $this->render('/partials/youtube-player/youtube-player', [
    'songByYoutube' => $songByYoutube,
]); ?>


    <br><br><br><br>

    <br><br><br><br>
    <h2 class="main-page-h2"><?= Yii::t('app', 'Popular albums') ?></h2>
    <br><br>
    <div class="row row-flex">

        <?php foreach ($albumsByPopularity as $album): ?>

            <a href="/<?= Yii::$app->language ?>/albums/<?= $album['url']; ?>/"
               class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-6 main-pages-extended">
                <div class="plates-albums-outside">

                    <div class="plates-albums">
                        <?php if ($album['photos']):?>
                            <p>
                                <img class="plates-img"
                                     src="/files/albums/<?= $album['first_letter'] ?>/<?= $album['photos'] ?>"
                                     alt="<?= $album['name'] ?>"
                                     width="210">

                            </p>
                        <?php endif;?>



                        <p class="plates-albums-title"><?= $album['name']; ?>

                            <?php if ($album['year']): ?>
                                (<?= $album['year']; ?>)
                            <?php endif; ?>

                        </p>

                        <p class="plates-albums-artist-name"><?= $album['artistName']; ?>
                        </p>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <br><br><br><br>

<?php

/*
 *
<a href="/script/first-letter/">first-letter</a><br>
<a href="/script/artists/">artists</a><br>
<a href="/script/albums/">albums</a><br>


 *             <?php if ($songs['year']): ?>
                            (<?php// $songs['year']; ?>)
                        <?php endif; ?>
 * */

?>