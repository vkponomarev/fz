<?php

/**
 * @var $this frontend\controllers\MainPageController
 * @var $modal frontend\controllers\YoutubeController
 *
 * @var $songByYoutube yii\web\View
 * @var $artistByPopularity yii\web\View
 * @var $albumsByPopularity yii\web\View
 * @var $songsByPopularity yii\web\View
 * @var $songsByListenMusic common\components\songs\SongsByListenMusicMainPage
 */

?>

<br><br>
<a name="listen-music"></a><h1 class="main-page-h1"><?= Yii::t('app', 'Listen to music online') ?></h1>
<br><br>

<div class="rflex songs">

    <ul>
        <?php foreach ($songsByListenMusic as $song): ?>

            <li>
                <?php if ($song['url_youtube']): ?>
                    <span onclick="sYM(this)" data-url="<?= $song['url_youtube'] ?>">
                </span>
                <?php else: ?>
                    <span class="false">
                </span>
                <?php endif; ?>
                <div>
                    <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $song['artistUrl'] ?>/">
                        <?= $song['artistName'] ?> </a>
                    &nbsp;-&nbsp;
                    <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $song['url'] ?>/">
                        <?= $song['name'] ?> </a>
                </div>
            </li>

        <?php endforeach; ?>
    </ul>

</div>

<br><br><br><br>
<a name="popular-music"></a><h2 class="main-page-h2"><?= Yii::t('app', 'Popular music') ?></h2>


<?php //echo print_r($item);?>
<br><br>
<div class="rflex pop-artist">

    <?php foreach ($artistByPopularity as $artist): ?>

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/artists/<?= $artist['url']; ?>/"
           class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates-artists-main">
            <div class="plates-artists-outside">
                <div class="plates-artists">
                    <?php if ($artist['photos'] == 'asdsds'): ?>
                        <p>
                            <img class="plates-artists-img"
                                 src="/files/artists/<?= $artist['first_letter'] ?>/<?= $artist['photos'] ?>"
                                 alt="<?= $artist['name'] ?>"
                                 width="200">
                        </p>
                    <?php endif; ?>
                    <br><br><br><br>
                    <p class="plates-artists-title"><?= $artist['name']; ?></p>
                    <p class="plates-artists-under-title"><?php // $itemParent['short_description']; ?></p>
                    <br><br><br><br>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<br><br><br><br>
<h2 class="main-page-h2"><?= Yii::t('app', 'Popular albums') ?></h2>
<br><br>
<div class="rflex pop-albums">

    <?php foreach ($albumsByPopularity as $album): ?>

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/albums/<?= $album['url']; ?>/"
           class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12">
            <div>

                <div>
                    <p>
                        <img
                                src="/files/albums/<?= $album['first_letter'] ?>/<?= $album['photos'] ?>"
                                alt="<?= $album['name'] ?>"
                        >

                    </p>

                    <p><?= $album['name']; ?><?= ' '; ?>

                        <?php if ($album['year']): ?>
                            (<?= $album['year']; ?>)
                        <?php endif; ?>

                    </p>

                    <p><?= $album['artistName']; ?>
                    </p>

                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<br><br><br><br>
<h2 class="main-page-h2"><?= Yii::t('app', 'Popular songs') ?></h2>
<br><br>
<div class="rflex pop-songs">
    <?php //(new \common\components\dump\Dump())->printR($songsByPopularity); ?>
    <?php foreach ($songsByPopularity as $songs): ?>

        <a href="/<?= Yii::$app->params['language']['current']['url'] ?>/songs/<?= $songs['url']; ?>/"
           class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div>

                <div>

                    <?php if ($songs['albumPhoto']): ?>
                        <p>
                            <img
                                    src="/files/albums/<?= $songs['albumFirstLetter'] ?>/<?= $songs['albumPhoto'] ?>"
                                    alt="<?= $songs['name'] ?>"
                            >

                        </p>
                    <?php endif; ?>

                    <p><?= $songs['name']; ?></p>


                    <p class="plates-songs-artist-name"><?= $songs['artistName']; ?>
                    </p>

                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<br><br><br><br>

<?php if (Yii::$app->language == 'ru'): ?>
    <div class="row" style="text-align: -webkit-center;display: flex; flex-wrap: wrap;">
        <div class="col-xs-12" style="/*max-width:400px;*/text-align: center;padding: 20px;background-color: #f4e1dd;">
            <h2 style="color:#255e62;font-size: 28px;">Онлайн калькуляторы для женщин</h2>
            <p>Кальуляторы беременности, пола ребенка, калькуляторы овуляции и другие калькуляторы.</p>
            <h2 style="color:#255e62;font-size: 28px;">Календарь месячных</h2>
            <p>Календари месячных, календари овуляции и безопасных дней.</p>
            <a href="https://womencalc.com/ru/">womencalc.com</a>
        </div>
    </div>
    <br>
    <div class="row" style="text-align: -webkit-center;display: flex; flex-wrap: wrap;">
        <div class="col-xs-12" style="/*max-width:400px;*/text-align: center;padding: 20px;background-color: #c8e9ff;">
            <h2 style="color:#255e62;font-size: 28px;">Календарь онлайн</h2>
            <p>Календарь на год.</p>
            <h2 style="color:#255e62;font-size: 28px;">Праздники</h2>
            <p>Производственный календарь. Праздники онлайн.</p>
            <a href="https://timesles.com/ru/">timesles.com</a>
        </div>
    </div>
<?php else: ?>

    <div class="row" style="text-align: -webkit-center;display: flex; flex-wrap: wrap;">
        <div class="col-xs-12" style="text-align: center;padding: 20px;background-color: #f4e1dd;">
            <h2 style="color:#255e62;font-size: 28px;">Online calculators for women</h2>
            <p>Pregnancy calculators, baby gender, ovulation calculators and other calculators.</p>
            <h2 style="color:#255e62;font-size: 28px;">Period calendar</h2>
            <p>Period calendars, ovulation calendars and safe days.</p>
            <a href="https://womencalc.com/en/">womencalc.com</a>
        </div>
    </div>
    <br>
    <div class="row" style="text-align: -webkit-center;display: flex; flex-wrap: wrap;">
        <div class="col-xs-12" style="text-align: center;padding: 20px;background-color:  #c8e9ff;">
            <h2 style="color:#255e62;font-size: 28px;">Calendar online</h2>
            <p>Calendar for a year.</p>
            <h2 style="color:#255e62;font-size: 28px;">Holidays</h2>
            <p>Business days calendar. Holidays calendar.</p>
            <a href="https://timesles.com/en/">timesles.com</a>
        </div>
    </div>
<?php endif; ?>

