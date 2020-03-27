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


/** Достаем все уникальные элементы из m_albums_tmp поля genres*/

    $albums = Yii::$app->db
            ->createCommand('
                    select
                    id,
                    genre
                    from
                    m_albums_tmp
                   ')
        ->queryAll();

//echo '<pre>';
//var_dump($texts);
//print_r($albums);
//echo '</pre>';
    $genres = array();

    foreach ($albums as $album) {

        //echo mb_substr($artist['name'], 0, 1) . '  ' . $artist['name'] . '<br>';
        //echo trim($album['genre']) . '<br>';
        $str = preg_replace('/(\x{200e}|\x{200f})/u', '', $album['genre']);
        $str = trim($str);
        if ($album['genre']) {
            if (in_array($str, $genres)) {
                //echo "Нашел Irix";
            } else {

                array_push($genres, $str);
                //echo $album->id . ' не нашел добавил ' . $album->genre . '<br>';
            }
            //echo $pageNewUrl = $page->url . '-' . $page->id . '<br>';
        }
    }
    asort($genres);



unset($genres[457]);
unset($genres[463]);
unset($genres[548]);
unset($genres[411]);
unset($genres[542]);
$genres = array_unique($genres);
/*
if ($genres[69] == $genres[617]){

    echo 'они равны';
} else{

    echo json_encode($genres[69]) .' не равно '. json_encode($genres[617]);

}*/

//echo '<pre>';
//var_dump($texts);
//print_r($genres);
//echo '</pre>';

/** Достаем все уникальные элементы из m_artists_tmp поля genres*/

$artists = Yii::$app->db
    ->createCommand('
                    select
                    id,
                    genres
                    from
                    m_artists_tmp
                   ')
    ->queryAll();

//echo '<pre>';
//var_dump($texts);
//print_r($albums);
//echo '</pre>';

$genres2 = array();

//echo $albums['41686']['genre'] . ' id=  ' . $albums['41686']['id'] . '<br>';
//echo $albums['386']['genre'] . ' id=  ' . $albums['386']['id'] . '<br>';

foreach ($artists as $artist) {

    //echo mb_substr($artist['name'], 0, 1) . '  ' . $artist['name'] . '<br>';
    //echo trim($album['genre']) . '<br>';
    if ($artist['genres']) {

        $pieces = explode(',', $artist['genres']);



        foreach ($pieces as $piece) {

            $str = preg_replace('/(\x{200e}|\x{200f})/u', '', $piece);
            $str = trim($str);
            $str = preg_replace('/[\s]{2,}/', ' ', $str);
            if (in_array($str, $genres2)) {
                //echo "Нашел Irix";
            } else {

                array_push($genres2, $str);
                //echo $album->id . ' не нашел добавил ' . $album->genre . '<br>';
            }
            //echo $pageNewUrl = $page->url . '-' . $page->id . '<br>';

        }



    }
}
asort($genres2);
$genres2 = array_unique($genres2);


unset($genres2[488]);

/*
if ($genres[69] == $genres[617]){

    echo 'они равны';
} else{

    echo json_encode($genres[69]) .' не равно '. json_encode($genres[617]);

}*/


//echo '<pre>';
//var_dump($texts);
//print_r($genres2);
//echo '</pre>';

/** Соединим оба массива */

$genres3 = array_merge($genres, $genres2);

asort($genres3);
//array_unique($genres3);
$genres3 = array_unique($genres3);
echo count($genres3) . '<br>';
echo count($genres2) . '<br>';
echo count($genres) . '<br>';
//echo '<pre>';
//var_dump($texts);
//print_r($genres3);
//echo '</pre>';

/** Вставляем готовый отсортированный массив в таблицу */

   /*foreach ($genres3 as $genre) {

        echo $genre . '<br>';

        $model = new \common\models\MGenres();

        //$model->parent_id = 0;
        $model->genre = $genre;
        $model->url = FLowUrlTransliteration::UrlTransliteration($genre);
        //echo $model->id . '<br>';

        $model->save();
    }*/


/** Добавляем к готовой таблице в поле ulr id строки. */

   /* $pages = \common\models\MGenres::find()->all();
    foreach ($pages as $page) {

    echo $page->url . '<br>';
    echo $pageNewUrl = $page->url . '-' . $page->id;
    $page->url = $pageNewUrl;
    $page->update();

    }*/


?>


</div>
