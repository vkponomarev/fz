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



/**
 * Переносим все данные в основную таблицу
 */
function firstMove(){


    $artists = Yii::$app->db
        ->createCommand('
                    select
                    *
                    from
                    m_artists_tmp_02
                    ORDER BY name
                   ')
        ->queryAll();



    $urlTransliteration = new FlowUrlTransliteration();

    $count = 0;
    //echo $urlTransliteration->UrlTransliteration($artists[10]['name']);
    foreach ($artists as $artist) {
        $count++;
        //echo $artist['name'] . ' = ';
        //echo $urlTransliteration->UrlTransliteration($artist['name']) . '<br>';

        //if ($count==100)
        //   break;
        $model = new \common\models\MArtists();
        $model->url = $urlTransliteration->UrlTransliteration($artist['name']) . '-' . $count;
        $model->name = $artist['name'];

        if ($artist['photo'])
        $model->photo = $artist['photo'];

        if ($artist['place'])
        $model->origin = $artist['place'];

        if ($artist['genre'])
        $model->genres = $artist['genre'];

        if ($artist['label'])
        $model->labels = $artist['label'];

        if ($artist['wikipedia'])
        $model->url_wikipedia = $artist['wikipedia'];

        if ($artist['website'])
        $model->url_website = $artist['website'];

        if ($artist['facebook'])
        $model->url_facebook = $artist['facebook'];

        if ($artist['twitter'])
        $model->url_twitter = $artist['twitter'];

        if ($artist['youtube'])
        $model->url_youtube = $artist['youtube'];
        $model->src = $artist['own'];

        $model->save();


    }
}

function firstLetters(){

    $artists = Yii::$app->db
        ->createCommand('
                select
                name
                from
                m_artists
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

    $urlTransliteration = new FlowUrlTransliteration();

    $count=0;
    foreach ($firstLettersArray as $firstLetter) {
        $count++;
        echo $firstLetter . '<br>';


        $model = new \common\models\MArtistsFirstLetters();

        $model->first_letter = $firstLetter;
        $model->url = $urlTransliteration->UrlTransliteration($firstLetter) . '-' . $count;;
        //echo $model->id . '<br>';

        $model->save();

        //id	parent_id	first_letter	url	origin	languages_id
        /*$pages = \common\models\MArtistsHasFirstLetter::find()->all();
        foreach ($pages as $page) {

        echo $page->url . '<br>';
        echo $pageNewUrl = $page->url . '-' . $page->id;
          $page->url = $pageNewUrl;
         $page->update();
    */
    }

}


function firstLettersIdIntoArtists(){

    $artists = Yii::$app->db
        ->createCommand('
                select
                id,
                name
                from
                m_artists
               ')
        ->queryAll();

    $firstLettersArray = array();

    $firstLetters = Yii::$app->db
        ->createCommand('
                select
                id,
                first_letter
                from
                m_artists_first_letters
               ')
        ->queryAll();

    echo '<pre>';
    //var_dump($texts);
    print_r($firstLetters);
    echo '</pre>';

    $key = array_search('A', array_column($firstLetters, 'first_letter'));
    echo $key .'<br>';
    echo $firstLetters[22]['id'];

    foreach ($artists as $artist) {

        //echo mb_substr($artist['name'], 0, 1) . '  ' . $artist['name'] . '<br>';

        $firstLetter = mb_strtoupper(mb_substr($artist['name'], 0, 1));

        /** Находим ключ для массива первых букв */

        $key = array_search($firstLetter, array_column($firstLetters, 'first_letter'));

        //if (!array_search($firstLetter, array_column($firstLetters, 'first_letter')))

        //echo $key . ' id =  ' . $firstLetters[$key]['id'] . ' first_letter =  ' . $firstLetters[$key]['first_letter'] . ' artists_name =  ' . $artist['name'] . '<br>';


        // обновить имеющуюся строку данных
        $customer = \common\models\MArtists::findOne($artist['id']);
        $customer->first_letter = $firstLetters[$key]['id'];
        $customer->save();

        /*$model = new \common\models\MArtistsFirstLetters();
        $model->first_letter = $firstLetter;
        $model->url = $urlTransliteration->UrlTransliteration($firstLetter) . '-' . $count;;
        //echo $model->id . '<br>';
        $model->save();*/

    }





}
function artistsPhotoCheck(){

    //1 . читаем каждую строку
    //2 . Находим поле photo проверяем входит ли название в массив не фоток.
    //3 . Если в массиве нет фото то берем first_letter и
    // 3.1 Проверяем существует ли папка по этому номеру
    // 3.2 Если не существует создаем папку
    // 3.3 Если существует пропускаем
    // 3.4 Копируем файл из по названию из photo в папку с номером из first_letter
    // 3.5 Скопированный файл переименовываем в url данной строки
    // 3.6 Вставляем новое название в поле photo

    $brokenImagesArray =[
        'Flag_-_Indonesia.png',
        'Flag_-_Switzerland.png',
        'Flag_-_Denmark.png',
        'Flag_-_Ukraine.png',
        'Flag_-_Luxembourg.png',
        'Flag_-_Romania.png',
        'Flag_-_Russia.png',
        'Flag_-_England.png',
        'Flag_-_Lithuania.png',
        'Flag_-_Poland.png',
        'Flag_-_Colombia.png',
        'Flag_-_Bulgaria.png',
        'Flag_-_Germany.png',
        'Flag_-_Ireland.png',
        'Flag_-_The_Gambia.png',
        'Flag_-_Iceland.png',
        'Flag_-_Finland.png',
        'Flag_-_Nigeria.png',
        'Flag_-_Greece.png',
        'Flag_-_The_Netherlands.png',
        'Flag_-_Thailand.png',
        'Flag_-_Multinational.png',
        'Flag_-_France.png',
        'Flag_-_Sweden.png',
        'Flag_-_United_Arab_Emirates.png',
        'Flag_-_Norway.png',
        'Flag_-_Faroe_Islands.png',
        'Flag_-_Latvia.png',
        'Flag_-_Peru.png',
        'Flag_-_Estonia.png',
        'Flag_-_Belgium.png',
        'Flag_-_Guernsey.png',
        'Flag_-_Bolivia.png',
        'Flag_-_Hungary.png',
        'Flag_-_Jamaica.png',
        'Flag_-_Italy.png',
        'Flag_-_Armenia.png',
        'Flag_-_Uzbekistan.png',
        'Flag_-_Ghana.png',
        'Flag_-_Jordan.png',
        'Flag_-_Tanzania.png',
        'Twitter_35.png',
        'Flag_-_Guyana.png',
        'Flag_-_Palestine.png',
        'Flag_-_United_Kingdom.png',
        'Flag_-_Cameroon.png',
        'Flag_-_Algeria.png',
        'Flag_-_Panama.png',
        'Flag_-_Canada.png',
        'Facebook_Icon.png',
        'Flag_-_Scotland.png',
        'Flag_-_Syria.png',
        'Flag_-_Honduras.png',
        'Flag_-_Iraq.png',
        'Flag_-_The_Bahamas.png',
        'Flag_-_Chile.png',
        'Flag_-_Turkey.png',
        'Flag_-_Unknown.png',
        'Flag_-_Israel.png',
        'Flag_-_Mongolia.png',
        'Flag_-_Macedonia.png',
        'Flag_-_Taiwan.png',
        'Flag_-_Pakistan.png',
        'Flag_-_Bangladesh.png',
        'Flag_-_Kuwait.png',
        'Flag_-_South_Africa.png',
        'Flag_-_Czech_Republic.png',
        'Flag_-_Azerbaijan.png',
        'Flag_-_Vietnam.png',
        'Flag_-_Japan.png',
        'Flag_-_Malta.png',
        'Flag_-_Nepal.png',
        'Flag_-_New_Zealand.png',
        'Flag_-_China.png',
        'Flag_-_Barbados.png',
        'Flag_-_Venezuela.png',
        'Flag_-_Belarus.png',
        'Flag_-_Eritrea.png',
        'Wikia_Logo.png',
        'Flag_-_Angola.png',
        'Flag_-_Georgia.png',
        'Flag_-_Puerto_Rico.png',
        'Flag_-_Morocco.png',
        'Flag_-_Cape_Verde.png',
        'Flag_-_Democratic_Republic_of_the_Congo.png',
        'Flag_-_Singapore.png',
        'Flag_-_India.png',
        'Flag_-_Ethiopia.png',
        'Flag_-_Cuba.png',
        'Flag_-_Bahrain.png',
        'Flag_-_Grenada.png',
        'Flag_-_Trinidad_and_Tobago.png',
        'Flag_-_Uganda.png',
        'Flag_-_Nicaragua.png',
        'Flag_-_Tunisia.png',
        'Flag_-_Slovenia.png',
        'Flag_-_Slovakia.png',
        'Flag_-_Bosnia_and_Herzegovina.png',
        'Flag_-_Lebanon.png',
        'Flag_-_Haiti.png',
        'Flag_-_Costa_Rica.png',
        'Flag_-_Cyprus.png',
        'Flag_-_El_Salvador.png',
        'Flag_-_Paraguay.png',
        'Flag_-_Zambia.png',
        'Flag_-_Philippines.png',
        'Flag_-_Malaysia.png',
        'Flag_-_Australia.png',
        'Flag_-_Iran.png',
        'Flag_-_Zimbabwe.png',
        'Flag_-_Argentina.png',
        'Flag_-_Egypt.png',
        'Flag_-_Dominican_Republic.png',
        'Flag_-_Hong_Kong.png',
        'Flag_-_Cambodia.png',
        'MyspaceIcon.png',
        'Flag_-_United_States.png',
        'Flag_-_Albania.png',
        'Flag_-_Dominica.png',
        'Official_site.png',
        'Flag_-_Brazil.png',
        'Flag_-_Guatemala.png',
        'Flag_-_Ecuador.png',
        'Flag_-_Uruguay.png',
        'Flag_-_Spain.png',
        'Flag_-_Kyrgyzstan.png',
        'Flag_-_South_Korea.png',
        'Flag_-_Croatia.png',
        'Flag_-_Mexico.png',
        'Flag_-_Guadeloupe.png',
        'Flag_-_Northern_Ireland.png',
        'Flag_-_Austria.png',
        'Flag_-_Portugal.png',
        'Flag_-_American_Samoa.png',
        'Flag_-_Serbia.png',
        'Flag_-_Moldova.png',
        'Flag_-_Wales.png',
        'Flag_-_Turkmenistan.png',
        'Flag_-_Kazakhstan.png',
        'Wikipedia_sphere.png',
    ];


    $artists = Yii::$app->db
        ->createCommand('
                select
                id,
                name,
                url,
                first_letter,
                photos
                from
                m_artists
               ')
        ->queryAll();
    $count = 0;
    foreach ($artists as $artist) {
        $count ++;
        //2 . Находим поле photo проверяем входит ли название в массив не фоток.
        if (!is_null($artist['photos'])){

            $dirPhotoTmp = '/var/sites/flowlez.loc/frontend/web/files/artists/'. $artist['first_letter'] . '/' . $artist['photos'];

            if (!file_exists($dirPhotoTmp)) {

                echo 'Файла нет ' . $dirPhotoTmp . '<br>';
            }




        }

        //if($count === 11)
        //    break;
    }

}

function artistsPhotoMoveRename(){

    //1 . читаем каждую строку
    //2 . Находим поле photo проверяем входит ли название в массив не фоток.
    //3 . Если в массиве нет фото то берем first_letter и
    // 3.1 Проверяем существует ли папка по этому номеру
    // 3.2 Если не существует создаем папку
    // 3.3 Если существует пропускаем
    // 3.4 Копируем файл из по названию из photo в папку с номером из first_letter
    // 3.5 Скопированный файл переименовываем в url данной строки
    // 3.6 Вставляем новое название в поле photo

    $brokenImagesArray =[
        'Flag_-_Indonesia.png',
        'Flag_-_Switzerland.png',
        'Flag_-_Denmark.png',
        'Flag_-_Ukraine.png',
        'Flag_-_Luxembourg.png',
        'Flag_-_Romania.png',
        'Flag_-_Russia.png',
        'Flag_-_England.png',
        'Flag_-_Lithuania.png',
        'Flag_-_Poland.png',
        'Flag_-_Colombia.png',
        'Flag_-_Bulgaria.png',
        'Flag_-_Germany.png',
        'Flag_-_Ireland.png',
        'Flag_-_The_Gambia.png',
        'Flag_-_Iceland.png',
        'Flag_-_Finland.png',
        'Flag_-_Nigeria.png',
        'Flag_-_Greece.png',
        'Flag_-_The_Netherlands.png',
        'Flag_-_Thailand.png',
        'Flag_-_Multinational.png',
        'Flag_-_France.png',
        'Flag_-_Sweden.png',
        'Flag_-_United_Arab_Emirates.png',
        'Flag_-_Norway.png',
        'Flag_-_Faroe_Islands.png',
        'Flag_-_Latvia.png',
        'Flag_-_Peru.png',
        'Flag_-_Estonia.png',
        'Flag_-_Belgium.png',
        'Flag_-_Guernsey.png',
        'Flag_-_Bolivia.png',
        'Flag_-_Hungary.png',
        'Flag_-_Jamaica.png',
        'Flag_-_Italy.png',
        'Flag_-_Armenia.png',
        'Flag_-_Uzbekistan.png',
        'Flag_-_Ghana.png',
        'Flag_-_Jordan.png',
        'Flag_-_Tanzania.png',
        'Twitter_35.png',
        'Flag_-_Guyana.png',
        'Flag_-_Palestine.png',
        'Flag_-_United_Kingdom.png',
        'Flag_-_Cameroon.png',
        'Flag_-_Algeria.png',
        'Flag_-_Panama.png',
        'Flag_-_Canada.png',
        'Facebook_Icon.png',
        'Flag_-_Scotland.png',
        'Flag_-_Syria.png',
        'Flag_-_Honduras.png',
        'Flag_-_Iraq.png',
        'Flag_-_The_Bahamas.png',
        'Flag_-_Chile.png',
        'Flag_-_Turkey.png',
        'Flag_-_Unknown.png',
        'Flag_-_Israel.png',
        'Flag_-_Mongolia.png',
        'Flag_-_Macedonia.png',
        'Flag_-_Taiwan.png',
        'Flag_-_Pakistan.png',
        'Flag_-_Bangladesh.png',
        'Flag_-_Kuwait.png',
        'Flag_-_South_Africa.png',
        'Flag_-_Czech_Republic.png',
        'Flag_-_Azerbaijan.png',
        'Flag_-_Vietnam.png',
        'Flag_-_Japan.png',
        'Flag_-_Malta.png',
        'Flag_-_Nepal.png',
        'Flag_-_New_Zealand.png',
        'Flag_-_China.png',
        'Flag_-_Barbados.png',
        'Flag_-_Venezuela.png',
        'Flag_-_Belarus.png',
        'Flag_-_Eritrea.png',
        'Wikia_Logo.png',
        'Flag_-_Angola.png',
        'Flag_-_Georgia.png',
        'Flag_-_Puerto_Rico.png',
        'Flag_-_Morocco.png',
        'Flag_-_Cape_Verde.png',
        'Flag_-_Democratic_Republic_of_the_Congo.png',
        'Flag_-_Singapore.png',
        'Flag_-_India.png',
        'Flag_-_Ethiopia.png',
        'Flag_-_Cuba.png',
        'Flag_-_Bahrain.png',
        'Flag_-_Grenada.png',
        'Flag_-_Trinidad_and_Tobago.png',
        'Flag_-_Uganda.png',
        'Flag_-_Nicaragua.png',
        'Flag_-_Tunisia.png',
        'Flag_-_Slovenia.png',
        'Flag_-_Slovakia.png',
        'Flag_-_Bosnia_and_Herzegovina.png',
        'Flag_-_Lebanon.png',
        'Flag_-_Haiti.png',
        'Flag_-_Costa_Rica.png',
        'Flag_-_Cyprus.png',
        'Flag_-_El_Salvador.png',
        'Flag_-_Paraguay.png',
        'Flag_-_Zambia.png',
        'Flag_-_Philippines.png',
        'Flag_-_Malaysia.png',
        'Flag_-_Australia.png',
        'Flag_-_Iran.png',
        'Flag_-_Zimbabwe.png',
        'Flag_-_Argentina.png',
        'Flag_-_Egypt.png',
        'Flag_-_Dominican_Republic.png',
        'Flag_-_Hong_Kong.png',
        'Flag_-_Cambodia.png',
        'MyspaceIcon.png',
        'Flag_-_United_States.png',
        'Flag_-_Albania.png',
        'Flag_-_Dominica.png',
        'Official_site.png',
        'Flag_-_Brazil.png',
        'Flag_-_Guatemala.png',
        'Flag_-_Ecuador.png',
        'Flag_-_Uruguay.png',
        'Flag_-_Spain.png',
        'Flag_-_Kyrgyzstan.png',
        'Flag_-_South_Korea.png',
        'Flag_-_Croatia.png',
        'Flag_-_Mexico.png',
        'Flag_-_Guadeloupe.png',
        'Flag_-_Northern_Ireland.png',
        'Flag_-_Austria.png',
        'Flag_-_Portugal.png',
        'Flag_-_American_Samoa.png',
        'Flag_-_Serbia.png',
        'Flag_-_Moldova.png',
        'Flag_-_Wales.png',
        'Flag_-_Turkmenistan.png',
        'Flag_-_Kazakhstan.png',
        'Wikipedia_sphere.png',
    ];


    $artists = Yii::$app->db
        ->createCommand('
                select
                id,
                name,
                url,
                first_letter,
                photo
                from
                m_artists
               ')
        ->queryAll();
$count = 0;
foreach ($artists as $artist) {
    $count ++;
    //2 . Находим поле photo проверяем входит ли название в массив не фоток.
if (!in_array($artist['photo'], $brokenImagesArray) and (!is_null($artist['photo']))){

    echo $artist['photo'] . ' нет в сломаном массиве папки' . '<br>';

    // 3.1 Проверяем существует ли папка по этому номеру
    // 3.2 Если не существует создаем папку

    $dirName = '/var/sites/flowlez.loc/frontend/web/files/artists/' . $artist['first_letter'] . '/';

    if (!is_dir($dirName)) {
        mkdir($dirName, 0777, true);
        echo 'создали папку = ' . $dirName . '<br>';
    }

    $dirPhotoTmp = '/var/sites/flowlez.loc/frontend/web/files/artists/tmp/';

    $photoFullNameTmp = $dirPhotoTmp . $artist['photo'];
    $path_info = pathinfo($photoFullNameTmp);
    $photoFullNameNew = $dirName . $artist['url'] . '.' .$path_info['extension'];


    // 3.4 Копируем файл из по названию из photo в папку с номером из first_letter
    if (copy($photoFullNameTmp, $photoFullNameNew)) {
        echo "Файл успешно скопирован! = " . $photoFullNameNew  . '<br>';

        // обновить имеющуюся строку данных
        $customer = \common\models\MArtists::findOne($artist['id']);
        $customer->photos = $artist['url'] . '.' .$path_info['extension'];
        $customer->save();

    }else{
        echo "Файл не удалось скопировать!";
    }



}

    //if($count === 11)
    //    break;
}

}

function resizeImage()
{

    $artists = Yii::$app->db
        ->createCommand('
                select
                id,
                name,
                url,
                first_letter,
                photos
                from
                m_artists
               ')
        ->queryAll();


    foreach ($artists as $artist) {

        if (!is_null($artist['photos'])) {
            echo $artist['photos'].'<br>';
            $image = new \common\components\tools\SimpleImage();
            $image->load('/var/sites/flowlez.loc/frontend/web/files/artists/' . $artist['first_letter'] . '/' . $artist['photos']);
            if (!$image->image) continue;
            $width = $image->getWidth();
            //if (!$width)
            //    continue;
            $width += random_int(10, 200);
            $image->resizeToWidth($width);
            $image->save('/var/sites/flowlez.loc/frontend/web/files/artists/' . $artist['first_letter'] . '/' . $artist['photos']);



        }

    }

}

/** 1 - Первый этап сделан таблица перенесена с новыми урлами */
//firstMove(); ++

/** 2 - Второй этап внесение начальных букв в определенную таблицу*/
//firstLetters(); ++

/** 3 - этап нужно распределить первые буквы и потом сделать так чтобы можно было выводить артистов от первых букв */
/** 3-1 Добавление id из таблицы first_letter к таблице artists */
//firstLettersIdIntoArtists(); ++

/**Проверяем существует ли фотка которая указана в photo*/
//artistsPhotoCheck();++

/** Перемещаем фотографиии по заданному пути и переименовываем фотки.*/
//artistsPhotoMoveRename();++

/** Ресайз фотографий*/
//resizeImage();++

/** Крошки для first_letters*/

/** Крошки для artists*/

?>


</div>
