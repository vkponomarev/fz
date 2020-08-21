<?php


?>
<?php if (isset(Yii::$app->params['prevNext'])):?>
<?php if (Yii::$app->params['prevNext']['prev'] or Yii::$app->params['prevNext']['next']):?>
<?php if (Yii::$app->params['prevNext']['prev']):?>
<?php if (Yii::$app->params['prevNext']['prev'] =='self'):?>
<link rel="prev" href="/<?= Yii::$app->language ?>/<?=Yii::$app->params['prevNext']['url'] ?>/" />
<?php else:?>
<link rel="prev" href="/<?= Yii::$app->language ?>/<?=Yii::$app->params['prevNext']['url'] ?>/?page=<?=Yii::$app->params['prevNext']['prev'] ?>&per-page=<?=Yii::$app->params['prevNext']['pageSize'] ?>" />
<?php endif;?>
<?php endif;?>
<?php if (Yii::$app->params['prevNext']['next']):?>
<link rel="next" href="/<?= Yii::$app->language ?>/<?=Yii::$app->params['prevNext']['url'] ?>/?page=<?=Yii::$app->params['prevNext']['next'] ?>&per-page=<?=Yii::$app->params['prevNext']['pageSize'] ?>" />
<?php endif;?>
<?php endif;?>
<?php endif;?>
