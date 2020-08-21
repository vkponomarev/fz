<?php

/* @var $this \yii\web\View */
/* @var $content string */


//AppAsset::register($this);
//echo $this->params['title'];


?>
<?php foreach (Yii::$app->params['language']['all'] as $one): ?>
<?php if ($one['url'] <> Yii::$app->language):?>
   <link rel="alternate" hreflang="<?= $one['url'] ?>" href="<?= \yii\helpers\Url::home(true) . $one['url'] . '/' . Yii::$app->params['alternate'] ?>"/>
<?php endif;?>
<?php endforeach; ?>

