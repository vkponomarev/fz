<?php
/* @var $this yii\web\View */


$this->title=$pages->title;



?>
<h1>pages-text/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<p>

    <?php echo $pages->url; ?>
    <br>
    <?php echo $pages->menu_name; ?>

    <br>
    <?php echo $pages->title; ?>
    <br>
    <?php echo $pages->h1; ?>
    <br>
    <?php echo $pages->description; ?>
    <br>
    <?php echo $pages->keywords; ?>
    <br>
    <?php echo $pages->text1; ?>
    <br>
    <?php echo $pages->text2; ?>
    <br>
    <?php echo $pages->active; ?>

    <?php // \common\models\PagesText::getLanguageId() ?>
    <?php \common\models\PagesText::getIndex() ?>



</p>