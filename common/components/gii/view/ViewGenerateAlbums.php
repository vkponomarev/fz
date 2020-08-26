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
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;

class ViewGenerateAlbums
{


    function generate($valueOne, $valueTwo, $languagesData)
    {
        set_time_limit(500000);
        $albums = new Albums();
        $albumsByStartEnd =  $albums->byStartEnd($valueOne, $valueTwo);
        $count = $valueOne;
        foreach ($albumsByStartEnd as $one) {

            $count++;
            $bigData = new \common\components\bigData\BigData();
            $bigData->saveData($count, 'work');

            foreach ($languagesData as $language) {

                Yii::$app->language = $language['url'];
                $id = $one['id'];
                $url = $one['url'];

                $textID = '57'; // ID из таблицы pages
                $table = 'm_albums'; // К какой таблице отностся данная страница
                $mainUrl = 'albums'; // Основной урл

                $main = new Main();
                Yii::$app->params['language'] = $main->language(Yii::$app->language);
                Yii::$app->params['language']['all'] = $main->languages();
                Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
                Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
                Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

                $album = new Album();
                $albumData = $album->data($id);

                $songs = new Songs();
                $songsByAlbum = $songs->byAlbum($albumData['id']);

                $artist = new Artist();
                $artistByAlbum = $artist->byAlbum($albumData['m_artists_id']);

                $featuring = new Featuring();
                $featuringByArtist = $featuring->byArtist($artistByAlbum['id']);

                $songsByAlbum = $songs->addFeaturing($songsByAlbum, $featuringByArtist);

                $genres = new Genres();
                $genresByAlbum = $genres->byAlbum($albumData['id']);

                $pageTexts = new PageTexts();
                $pageTexts->updateByAlbum($albumData);
                $pageTexts->updateByArtist($artistByAlbum);

                $firstLetter = new FirstLetter();
                $firstLetterByArtist = $firstLetter->byArtist($artistByAlbum);

                $breadCrumbs = new Breadcrumbs();
                Yii::$app->params['breadcrumbs'] = $breadCrumbs->album($albumData, $artistByAlbum, $firstLetterByArtist);


                $file = Yii::$app->view->render('@frontend/views/albums/album-page.min.php', [

                    'albumData' => $albumData,
                    'songsByAlbum' => $songsByAlbum,
                    'artistByAlbum' => $artistByAlbum,
                    'genres' => $genresByAlbum,

                ]);

                $folder = ceil($id/1000);
                $view = New View();
                $fileName = $url . '-' . $language['url'] . '.php';
                $filePath = $view->realPath() . '/view/albums/' . $folder . '/' . $id . '/';

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
