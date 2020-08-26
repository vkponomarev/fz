<?php

use yii\widgets\ListView;
/* @var $this yii\web\View
 * @var $songByYoutube common\components\song\SongByYoutube
 * @var $artistsByFirstLetter common\components\artists\ArtistsByFirstLetter
 *
 */

?><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><div class="artists-index-letter rflex"><div><?= ListView::widget([
            'dataProvider' => $artistsByFirstLetter,
            'itemOptions' => ['class' => 'post'],
            'itemView' => 'artists-page_item.min.php',
            'layout' => '{items}{pager}',

            'pager' => [
                    'registerLinkTags' => false,
            ],]) ?></div></div>