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

class ViewGeneratePagesSongs
{


    function generate($languagesData)
    {
        set_time_limit(500000);

        foreach ($languagesData as $language) {

            Yii::$app->language = $language['url'];

            $url = 0;
            $textID = '55'; // ID из таблицы pages
            $table = 0; // К какой таблице отностся данная страница
            $mainUrl = 'songs'; // Основной урл

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


            $songs = new Songs();
            $songsByPopularity = $songs->byPopularity(20);

            $songsByLyrics = $songs->byLyrics(10);
            $songsByTranslations = $songs->byTranslations(10, Yii::$app->params['language']['id']);
            $songsByListen = $songs->byListen(20);


            $file = Yii::$app->controller->renderPartial('page-songs', [
                'songsByPopularity' => $songsByPopularity,
                'songsByLyrics' => $songsByLyrics,
                'songsByTranslations' => $songsByTranslations,
                'songsByListen' => $songsByListen,

            ]);

            $view = New View();
            $fileName = $language['url'] . '.php';
            $filePath = $view->realPath() . '/view/pages/songs/';

            $view->generateFile($file, $fileName, $filePath);

            $arrayName = $language['url'] . '-array.php';
            $array = [
                'language' => Yii::$app->params['language'],
                'text' => Yii::$app->params['text'],
                'canonical' => Yii::$app->params['canonical'],
                'alternate' => Yii::$app->params['alternate'],
            ];

            $view->generateFileArray($array, $arrayName, $filePath);

        }

    }

}
