<?php

/* @var $this \yii\web\View */
/* @var $content string */



//AppAsset::register($this);
//echo $this->params['title'];
$relativeHomeUrl = \yii\helpers\Url::home(true);


?>
<?php if ($pages):?>
<meta property="og:title" content="<?=$pagesTranslations->title?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?=$relativeHomeUrl?><?=Yii::$app->language?>/<?=$pages->url?>/" />
    <meta property="og:image" content="<?=$relativeHomeUrl?>files/category-icons/<?=$pages->id?>.png" />
    <meta property="og:description" content="<?=$pagesTranslations->description?>" />
<?php endif;?>