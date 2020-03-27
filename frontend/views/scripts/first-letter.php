<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
//echo $pageText['title'];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=Yii::t('app', 'Congratulations')?></h1>




        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
<?php
/*
   $artists1 = Yii::$app->db
        ->createCommand('
                select
                COUNT(*)
                from
                m_artists_tmp
               ')
        ->queryAll();


echo '<pre>';
//var_dump($texts);
print_r($artists1);
echo '</pre>';
*/

  /* $test = \common\models\MArtistsTmp::find()->count();

    echo '<pre>';
    //var_dump($texts);
    print_r($test);
    echo '</pre>';*/

/**

 Выбираем все имена артистов
 */
    $artists = Yii::$app->db
        ->createCommand('
                select
                name
                from
                m_artists_tmp
               ')
        ->queryAll();

    $firstLettersArray = array();

    foreach ($artists as $artist) {

        //echo mb_substr($artist['name'], 0, 1) . '  ' . $artist['name'] . '<br>';

        if (in_array(mb_strtoupper(mb_substr($artist['name'], 0, 1)), $firstLettersArray)) {
            //echo "Нашел Irix";
        } else {

            array_push($firstLettersArray, mb_strtoupper(mb_substr($artist['name'], 0, 1)));

        }

        //echo $pageNewUrl = $page->url . '-' . $page->id . '<br>';
    }
    asort($firstLettersArray);
    foreach ($firstLettersArray as $firstLetter) {

        echo $firstLetter . '<br>';


    /*$model = new \common\models\MArtistsHasFirstLetter();

    $model->parent_id = 0;
    $model->first_letter = $firstLetter;
    $model->url = $firstLetter;
    //echo $model->id . '<br>';

    $model->save();*/


    /*$pages = \common\models\MArtistsHasFirstLetter::find()->all();
    foreach ($pages as $page) {

    echo $page->url . '<br>';
    echo $pageNewUrl = $page->url . '-' . $page->id;
      $page->url = $pageNewUrl;
     $page->update();
*/
    }


?>


</div>
