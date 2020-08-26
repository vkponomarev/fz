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
use common\components\translation\Translation;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;

class ViewGenerateArtists
{


    function generate($valueOne, $valueTwo, $languagesData)
    {
        set_time_limit(500000);
        $artists = new Artists();
        $artistsByStartEnd =  $artists->byStartEnd($valueOne, $valueTwo);
        $count = $valueOne;
        foreach ($artistsByStartEnd as $one) {

            $count++;
            $bigData = new \common\components\bigData\BigData();
            $bigData->saveData($count, 'work');

            foreach ($languagesData as $language) {

                Yii::$app->language = $language['url'];
                $id = $one['id'];
                $url = $one['url'];
                $textID = '56'; // ID из таблицы pages
                $table = 'm_artists'; // К какой таблице отностся данная страница
                $mainUrl = 'artists'; // Основной урл

                //$urlCheck = new UrlCheck();
                //$urlCheckID = $urlCheck->id($url);
                //$urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
                //$urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

                $main = new Main();
                Yii::$app->params['language'] = $main->language(Yii::$app->language);
                Yii::$app->params['language']['all'] = $main->languages();
                Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
                Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
                Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

                $artist = new Artist();
                $artistData = $artist->data($id);

                $pageTexts = new PageTexts();
                $pageTexts->updateByArtist($artistData);

                $albums = new Albums();
                $albumsByArtist = $albums->byArtist($artistData['id']);

                $songs = new Songs();
                $songsByArtist = $songs->byArtist($artistData['id']);

                if ($songsByArtist) {
                    $translation = new Translation();
                    $translationCheckOrigin = $translation->checkOrigin($songsByArtist[0]['id'], Yii::$app->params['language']['current']['id']);
                } else {
                    $translationCheckOrigin = false;
                }

                $featuring = new Featuring();
                $featuringByArtist = $featuring->byArtist($artistData['id']);

                $genres = new Genres();
                $genresByArtist = $genres->byArtist($artistData['id']);

                $songsByArtist = $songs->addFeaturing($songsByArtist, $featuringByArtist);

                $firstLetter = new FirstLetter();
                $firstLetterByArtist = $firstLetter->byArtist($artistData);

                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->artist($artistData, $firstLetterByArtist);

                $file = Yii::$app->view->render('@frontend/views/artists/artist-page.min.php', [

                    'artistData' => $artistData,
                    'albumsByArtist' => $albumsByArtist,
                    'songsByArtist' => $songsByArtist,
                    'genres' => $genresByArtist,
                    'translationCheckOrigin' => $translationCheckOrigin,
                    

                ]);

                $folder = ceil($id/1000);
                $view = New View();
                $fileName = $url . '-' . $language['url'] . '.php';
                $filePath = $view->realPath() . '/view/artists/' . $folder . '/' . $id . '/';

                //(new \common\components\dump\Dump())->printR($filePath);

                //(new \common\components\dump\Dump())->printR(Yii::$app->params['language']['current']['url']);
                //die;
                $view->generateFile($file, $fileName, $filePath);

                $arrayName = $url . '-' . $language['url'] . '-array.php';
                $array = [
                    'text' => Yii::$app->params['text'],
                    'canonical' => Yii::$app->params['canonical'],
                    'alternate' => Yii::$app->params['alternate'],
                    'breadcrumbs' => Yii::$app->params['breadcrumbs']
                ];

                $view->generateFileArray($array, $arrayName, $filePath);

            }
        }
    }

}
