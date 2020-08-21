<?php

namespace common\components\gii\view;


use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\bigData\BigData;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genres\Genres;
use common\components\gii\view\View;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\songs\Songs;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;

class ViewGenerateArtists
{


    function generate($valueOne, $valueTwo, $languagesData)
    {
        $artists = new Artists();
        $artistsByAll =  $artists->byAll();
        $count = 0;
        foreach ($artistsByAll as $artistByOne) {

            $count++;
            $bigData = new \common\components\bigData\BigData();
            $bigData->saveData($count, 'work');

            foreach ($languagesData as $language) {

                //$url = 349;
                $textID = '56'; // ID из таблицы pages
                $table = 'm_artists'; // К какой таблице отностся данная страница
                $mainUrl = 'artists'; // Основной урл

                //$urlCheck = new UrlCheck();
                //$urlCheckID = $urlCheck->id($url);
                //$urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
                //$urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

                $main = new Main();
                Yii::$app->params['language'] = $main->language();
                Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['id']);
                Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
                Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

                $artist = new Artist();
                $artistData = $artist->data(349);

                $pageTexts = new PageTexts();
                $pageTexts->updateByArtist($artistData);

                $albums = new Albums();
                $albumsByArtist = $albums->byArtist($artistData['id']);

                $songs = new Songs();
                $songsByArtist = $songs->byArtist($artistData['id']);

                $featuring = new Featuring();
                $featuringByArtist = $featuring->byArtist($artistData['id']);

                $genres = new Genres();
                $genresByArtist = $genres->byArtist($artistData['id']);

                $songsByArtist = $songs->addFeaturing($songsByArtist, $featuringByArtist);

                $firstLetter = new FirstLetter();
                $firstLetterByArtist = $firstLetter->byArtist($artistData);

                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->artist($artistData, $firstLetterByArtist);

                //$file = 'wefwaef';


                $file = Yii::$app->controller->renderPartial('artist-page', [
                    'artistData' => $artistData,
                    'albumsByArtist' => $albumsByArtist,
                    'songsByArtist' => $songsByArtist,
                    'genres' => $genresByArtist,

                ]);

                $id = 345;
                $id = ceil(2001/1000);
                echo $id;


                $view = New View();
                $fileName = 'ru.php';
                $filePath = $view->realPath() . '/view/artists/349/';
                $view->generateFile($file, $fileName, $filePath);

                $arrayName = 'ru-array.php';
                $array = [
                    'language' => Yii::$app->params['language'],
                    'text' => Yii::$app->params['text'],
                    'canonical' => Yii::$app->params['canonical'],
                    'alternate' => Yii::$app->params['alternate'],
                    'breadcrumbs' => Yii::$app->params['breadcrumbs']
                ];

                //(new \common\components\dump\Dump())->printR($array);

                $view->generateFileArray($array, $arrayName, $filePath);

                //(new \common\components\dump\Dump())->printR($filePath);
            }
        }
    }

}
