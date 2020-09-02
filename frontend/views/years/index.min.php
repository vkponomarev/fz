<?php

/* @var $this yii\web\View

 * @var $AlbumsByRandom \common\components\albums\AlbumsByRandom
 *
 *
 *

 */

//echo $pageText['title'];
?><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><div class="artists-index rflex"><div><?php foreach ($genresData as $eachLink): ?><a href="/<?= Yii::$app->language ?>/genres/<?= $eachLink['url'] ?>/"><?= $eachLink['name'] ?></a><?php endforeach;?></div></div>