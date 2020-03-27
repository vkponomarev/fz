<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.08.19
 * Time: 18:06
 */
/* @var $this yii\web\View */
/* @var $page \common\models\Pages */

?>



<div class="row">


        <div class="col-lg-12">
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
            <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
        </div>
    <?php // \common\models\PagesText::getLanguageId() ?>
    <?php \common\models\PagesText::getIndex() ?>



</div>
