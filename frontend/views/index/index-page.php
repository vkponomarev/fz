<?php

use yii\widgets\ListView;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
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
<div class="container container-no-top-padding-extended text-center text-md-left">

    <div class="row text-center footer-num-line">

        <?= ListView::widget([
            'dataProvider' => $artistsIndexLinksLetter,
            'itemOptions' => ['class' => 'post'],
            'itemView' => 'index-page_item',
            'layout' => '{items}{pager}',

            'pager' => [
                    'registerLinkTags' => false,
            ],

        ]) ?>

    </div>

</div>