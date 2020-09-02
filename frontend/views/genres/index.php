<?php

/* @var $this \frontend\controllers\GenresController
 * @var $genresData \common\components\genres\GenresDataByMain

 */

//echo $pageText['title'];
?>
<br><br>
<h1 class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<div class="rflex genres-index">
    <div>
        <?php $count=0; ?>
        <?php foreach ($genresData as $eachLink): ?>
            <?php if ($count >0):?>,<?=' '?><?=' '?>
            <?php endif;?>
            <a href="/<?= Yii::$app->language ?>/genres/<?= $eachLink['url'] ?>/">
                <?= $eachLink['name'] ?>
            </a>
            <?php $count++ ?>
        <?php endforeach;?>
    </div>
</div>