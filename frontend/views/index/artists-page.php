<?php

use yii\widgets\ListView;
/* @var $this yii\web\View
 * @var $songByYoutube common\components\song\SongByYoutube
 * @var $artistsByFirstLetter common\components\artists\ArtistsByFirstLetter
 *
 */
//echo $pageText['title'];
//$artistsIndexLinksAll

/**


<?php foreach ($artistsLinks as $artistLink): ?>

<a href="/<?= Yii::$app->language ?>/artists/index/<?= $artistLink['url'] ?>/" class="artists-index-link">
<?= $artistLink['name'] ?>
</a>

<?php endforeach;?>

 *

 *
 *
 */

?>

<h1 class="main-page-h2"> <?= Yii::$app->params['text']['h1'] ?></h1>


<div class="container container-no-top-padding-extended text-center text-md-left">

    <div class="row text-center footer-num-line">

        <?= ListView::widget([
            'dataProvider' => $artistsByFirstLetter,
            'itemOptions' => ['class' => 'post'],
            'itemView' => 'artists-page_item',
            'layout' => '{items}{pager}',

            'pager' => [
                    'registerLinkTags' => false,
            ],

        ]) ?>

    </div>

</div>


