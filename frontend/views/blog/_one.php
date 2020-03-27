<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.08.19
 * Time: 16:24
 */
?>


<div class="col-lg-12">
    <h2><?=$model->title?><span class="badge"><?=$model->author->email ?></span></h2>

    <p>
        <?=$model->text?>

    </p>

    <p><?= \yii\bootstrap\Html::a('Подробнее',['blog/one','url'=>$model->url],['class'=>'btn btn-success','title'=>'Здесь тайтл'])?></a></p>



</div>