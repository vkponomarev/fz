<?php

/* @var $this \frontend\controllers\GenresController
 * @var $genresData \common\components\genres\GenresDataByMain

 */

//echo $pageText['title'];
?><br><br><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><div class="genres-index rflex"><div><?php foreach ($genresData as $eachLink): ?><a href="/<?= Yii::$app->language ?>/genres/<?= $eachLink['url'] ?>/"><?= $eachLink['name'] ?></a><?php endforeach;?></div></div>