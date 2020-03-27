<?php

/* @var $this \yii\web\View */
/* @var $content string */


//AppAsset::register($this);
//echo $this->params['title'];


?>

<?php foreach ($this->params['alternate'] as $one): ?>
    <link rel="alternate" hreflang="<?= $one['language'] ?>" href="<?= $one['url'] ?>"/>
<?php endforeach; ?>
