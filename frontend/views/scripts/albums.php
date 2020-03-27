<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
//echo $pageText['title'];

use common\models\components\FlowUrlTransliteration;


?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=Yii::t('app', 'Congratulations')?></h1>




        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
<?php






/** Разделяем url чтобы получить artist_url из albums_url. */

    /*$pages = \common\models\MAlbumsTmp::find()->all();
    foreach ($pages as $page) {

    //echo $page->url . '<br>';
    $pieces = explode(':', $page->url);
    $artists_url = 'https:' . $pieces[1];
    //echo $pageNewUrl = $page->url . '-' . $page->id;
    $page->artists_url = $artists_url;
    $page->update();

    }*/


?>


</div>
