<?php

namespace common\components\gii\view;


use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genres\Genres;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use Yii;

class ViewGeneratePagesAlbums
{


    function generate($languagesData)
    {
        set_time_limit(500000);

        foreach ($languagesData as $language) {

            Yii::$app->language = $language['url'];

            $url = false;
            $textID = '54'; // ID из таблицы pages
            $table = 0; // К какой таблице отностся данная страница
            $mainUrl = 'albums'; // Основной урл

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['language']['all'] = $main->languages();
            Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

            $albums = new Albums();
            $albumsByPopularity = $albums->byPopularity(8);

            $song = new Song();
            $songByYoutube = $song->byYoutube();

            $file = Yii::$app->view->render('@frontend/views/albums/index.min.php', [
                'albumsByPopularity' => $albumsByPopularity,
                'songByYoutube' => $songByYoutube,

            ]);

            $view = New View();
            $fileName = $language['url'] . '.php';
            $filePath = $view->realPath() . '/view/pages/albums/';

            $view->generateFile($file, $fileName, $filePath);

            $arrayName = $language['url'] . '-array.php';
            $array = [
                'text' => Yii::$app->params['text'],
                'canonical' => Yii::$app->params['canonical'],
                'alternate' => Yii::$app->params['alternate'],
            ];

            $view->generateFileArray($array, $arrayName, $filePath);

        }
    }

}
