<?php

/* @var $this \frontend\controllers\GenresController
 * @var $MLanguagesData \common\components\mLanguages\MLanguagesData
 */

//echo $pageText['title'];
?><br><br><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><div class="mLanguages-index rflex"><div><?php foreach ($MLanguagesData as $eachLink): ?><a href="/<?= Yii::$app->language ?>/languages/<?= $eachLink['url'] ?>/"><?= $eachLink['name'] ?></a><?php endforeach;?></div></div>