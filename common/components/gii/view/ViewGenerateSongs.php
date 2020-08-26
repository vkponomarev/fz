<?php

namespace common\components\gii\view;


use common\components\album\Album;
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
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\translations\Translations;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;

class ViewGenerateSongs
{


    function generate($valueOne, $valueTwo, $languagesData)
    {
        set_time_limit(500000);
        $songs = new Songs();
        $songsByStartEnd =  $songs->byStartEnd($valueOne, $valueTwo);
        $count = $valueOne;
        foreach ($songsByStartEnd as $one) {





            $count++;
            $bigData = new \common\components\bigData\BigData();
            $bigData->saveData($count, 'work');

            foreach ($languagesData as $language) {

                Yii::$app->language = $language['url'];
                $id = $one['id'];
                $url = $one['url'];
                $textID = '58'; // ID из таблицы pages
                $table = 'm_songs'; // К какой таблице относится данная страница
                $mainUrl = 'songs'; // Основной урл https://flowlez.com/ru/songs/

                //$urlCheck = new UrlCheck();
                //$urlCheckID = $urlCheck->id($url);
                //$urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
                //$urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

                $main = new Main();
                Yii::$app->params['language'] = $main->language(Yii::$app->language);
                Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
                Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
                Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


                $song = new Song();
                $songData = $song->data($id);

                $album = new Album();
                $albumData = $album->data($songData['m_albums_id']);

                $artist = new Artist();
                $artistBySong = $artist->bySong($songData['m_artists_id']);

                $songs = new Songs();
                $songsData = $songs->byArtistLimit($artistBySong['id']);

                $featuring = new Featuring();
                $featuringBySong = $featuring->bySong($songData['id']);

                $genres = new Genres();
                $genresBySong = $genres->bySong($songData['id']);

                $pageTexts = new PageTexts();
                $pageTexts->updateBySong($songData);
                $pageTexts->updateByArtist($artistBySong);

                $firstLetter = new FirstLetter();
                $firstLetterByArtist = $firstLetter->byArtist($artistBySong);

                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->song($artistBySong, $albumData, $songData, $firstLetterByArtist);

                $translations = new Translations();
                $translationsByLanguages = $translations->byLanguages($songData['id']);

                $translation = new Translation();
                $translationByLanguage = $translation->byLanguage($songData['id'], Yii::$app->params['language']['id']);

                //Yii::getAlias('@frontend/views/artists/artist-page.min.php')
                //$file = Yii::$app->controller->renderPartial('/../../artist-page.min.php', [
                $file = Yii::$app->view->render('@frontend/views/songs/song-page.min.php', [

                    'songData' => $songData,
                    'songsData' => $songsData,
                    'albumData' => $albumData,
                    'artistBySong' => $artistBySong,
                    'featuring' => $featuringBySong,
                    'genres' => $genresBySong,
                    'translationByLanguage' => $translationByLanguage,
                    'translationsByLanguages' => $translationsByLanguages,

                ]);

                $folder = ceil($id/1000);

                $view = New View();
                $fileName = $url . '-' . $language['url'] . '.php';
                $filePath = $view->realPath() . '/view/songs/' . $folder . '/' . $id . '/';

                //(new \common\components\dump\Dump())->printR($filePath);

                //(new \common\components\dump\Dump())->printR(Yii::$app->params['language']['current']['url']);
                //die;

                $view->generateFile($file, $fileName, $filePath);

                $arrayName = $url . '-' . $language['url'] . '-array.php';
                $array = [
                    'language' => Yii::$app->params['language'],
                    'text' => Yii::$app->params['text'],
                    'canonical' => Yii::$app->params['canonical'],
                    'alternate' => Yii::$app->params['alternate'],
                    'breadcrumbs' => Yii::$app->params['breadcrumbs']
                ];


                $view->generateFileArray($array, $arrayName, $filePath);

            }

            $arrayName = $url . '-' . $language['url'] . '-languages.php';
            Yii::$app->params['language']['all'] = $main->languages();
            $view->generateFileArray(Yii::$app->params['language']['all'], $arrayName, $filePath);

        }
    }

}
