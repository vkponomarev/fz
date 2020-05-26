<?php

/* @var $this yii\web\View
 * @var $songByYoutube \common\components\song\SongByYoutube
 * @var $songsByPopularity \common\components\songs\SongsByPopularity
 */
//echo $pageText['title'];$songByYoutube
?>

    <br><br><br>

<?= $this->render('/partials/youtube-player/youtube-player', [
    'songByYoutube' => $songByYoutube,
]); ?>


    <br><br><br><br>

    <h2 class="main-page-h2"><?= Yii::t('app', 'Popular songs') ?></h2>
    <br><br>
    <div class="row row-flex">
        <?php //(new \common\components\dump\Dump())->printR($songsByPopularity); ?>
        <?php foreach ($songsByPopularity as $songs): ?>

            <a href="/<?= Yii::$app->language ?>/songs/<?= $songs['url']; ?>/"
               class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col-12 main-pages-extended">
                <div class="plates-songs-outside">

                    <div class="plates-songs">

                        <?php if ($songs['albumPhoto']):?>
                            <p>
                                <img class="plates-songs-img"
                                     src="/files/albums/<?= $songs['albumFirstLetter'] ?>/<?= $songs['albumPhoto'] ?>"
                                     alt="<?= $songs['name'] ?>"
                                     width="100">

                            </p>
                        <?php endif;?>

                        <?= $songs['name']; ?>
                        <p class="plates-songs-title">

                        </p>

                        <p class="plates-songs-artist-name"><?= $songs['artistName']; ?>
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