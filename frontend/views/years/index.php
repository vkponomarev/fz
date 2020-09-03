<?php

/* @var $this frontend\controllers\YearsController
 * @var $yearsData common\components\years\YearsData
 *
 *
 */

//echo $pageText['title'];
?>
<h1 class="main-page-h1"><?= Yii::$app->params['text']['h1'] ?></h1>
<div class="rflex years-index">
    <div>
        <?php foreach ($yearsData as $eachLink): ?>

            <a href="/<?= Yii::$app->language ?>/years/<?= $eachLink['url'] ?>/">
                <?= $eachLink['name'] ?>
            </a>

        <?php endforeach;?>
    </div>
</div>