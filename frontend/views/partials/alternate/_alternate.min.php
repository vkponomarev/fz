<?php
/* @var $this \yii\web\View */
/* @var $content string */
?><?php foreach (Yii::$app->params['language']['all'] as $one): ?><?php if ($one['url'] <> Yii::$app->language):?><link href="<?= \yii\helpers\Url::home(true) . $one['url'] . '/' . Yii::$app->params['alternate'] ?>"hreflang="<?= $one['url'] ?>"rel=alternate><?php endif;?><?php endforeach; ?>