<?php

/* @var $this yii\web\View
 * @var $songByYoutube common\components\song\SongByYoutube
 * @var $albumsByPopularity common\components\albums\AlbumsByPopularity
 */

?>

    <br><br>
    <a name="popular-artists"></a><h1 class="main-page-h1"><?= Yii::t('app', 'Popular albums') ?></h1>
    <br><br>
    <div class="row row-flex">

        <?php foreach ($albumsByPopularity as $album): ?>

            <a href="/<?= Yii::$app->language ?>/albums/<?= $album['url']; ?>/"
               class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates-albums-main">
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

    <br><br><br>

