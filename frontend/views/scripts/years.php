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

/** Подсчет поличества строк*/

  /* $genres1 = Yii::$app->db
        ->createCommand('
                select
                COUNT(*)
                from
                m_albums_tmp
               ')
        ->queryAll();


echo '<pre>';
//var_dump($texts);
print_r($genres1);
echo '</pre>';*/



/** Подсчет поличества строк 2 вариант*/
/*
  $test = \common\models\MAlbumsTmp::find()->count();

    echo '<pre>';
    //var_dump($texts);
    print_r($test);
    echo '</pre>';
*/


/** Достаем все уникальные элементы из m_albums_tmp поля year*/

    $albums = Yii::$app->db
            ->createCommand('
                    select
                    id,
                    year
                    from
                    m_albums_tmp
                   ')
        ->queryAll();

//echo '<pre>';
//var_dump($texts);
//print_r($albums);
//echo '</pre>';
    $years = array();

    foreach ($albums as $album) {

        //echo mb_substr($artist['name'], 0, 1) . '  ' . $artist['name'] . '<br>';
        //echo trim($album['genre']) . '<br>';
        $str = preg_replace('/(\x{200e}|\x{200f})/u', '', $album['year']);
        $str = trim($str);
        if ($album['year']) {
            if (in_array($str, $years)) {
                //echo "Нашел Irix";
            } else {

                array_push($years, $str);
                //echo $album->id . ' не нашел добавил ' . $album->genre . '<br>';
            }
            //echo $pageNewUrl = $page->url . '-' . $page->id . '<br>';
        }
    }
    asort($years);

    $years = array_unique($years);

unset($years[96]);
/*
if ($genres[69] == $genres[617]){

    echo 'они равны';
} else{

    echo json_encode($genres[69]) .' не равно '. json_encode($genres[617]);

}*/

//echo '<pre>';
//var_dump($texts);
//print_r($years);
//echo '</pre>';




/** Вставляем готовый отсортированный массив в таблицу */

  /* foreach ($years as $year) {

        echo $year . '<br>';

        $model = new \common\models\MYears();

        //$model->parent_id = 0;
        $model->year = $year;
        $model->url = $year;
        //echo $model->id . '<br>';

        $model->save();
    }*/


/** Добавляем к готовой таблице в поле ulr id строки. */

   /* $pages = \common\models\MYears::find()->all();
    foreach ($pages as $page) {

    echo $page->url . '<br>';
    echo $pageNewUrl = $page->url . '-' . $page->id;
    $page->url = $pageNewUrl;
    $page->update();

    }*/


?>


</div>
