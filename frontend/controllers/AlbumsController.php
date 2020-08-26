<?php

namespace frontend\controllers;

use common\components\album\Album;
use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genres\Genres;
use common\components\main\Main;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\urlCheck\UrlCheck;
use common\models\components\FlowPageArtists;
use Yii;
use yii\web\Controller;


/**
 * Main controller
 * pageText($currentPage,$pageUsingKeys)
 *
 *
 *
 *
 */
class AlbumsController extends Controller
{


    public function actionIndex()
    {

        if (Yii::$app->params['usePagesDB']) {

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

            //$this->layout='';

            /*$name = $this->renderPartial('index', [

                 'albumsByPopularity' => $albumsByPopularity,
                 'songByYoutube' => $songByYoutube,

             ]);

             return $name;*/

            return $this->render('index.min.php', [

                'albumsByPopularity' => $albumsByPopularity,
                'songByYoutube' => $songByYoutube,

            ]);


        } else {

            $path = '/view/pages/albums/';
            $file = Yii::$app->language . '.php';
            $array = Yii::$app->language . '-array.php';

            $noDB = new NoDB();
            $fileDB = json_decode(file_get_contents($noDB->realPath() . $path . $array), TRUE);

            $languagesPath = '/view/languages/';
            $languagesArray = Yii::$app->language . '-array.php';
            $fileDBLanguages = json_decode(file_get_contents($noDB->realPath() . $languagesPath . $languagesArray), TRUE);

            Yii::$app->params['language'] = $fileDBLanguages['language'];
            Yii::$app->params['text'] = $fileDB['text'];
            Yii::$app->params['canonical'] = $fileDB['canonical'];
            Yii::$app->params['alternate'] = $fileDB['alternate'];

            return $this->render('index-noDB.min.php', [

                'file' => $file,
                'path' => $path,

            ]);

        }

    }

    public function actionAlbumPage($url)
    {

        if (Yii::$app->params['useAlbumsDB']) {

            $textID = '57'; // ID из таблицы pages
            $table = 'm_albums'; // К какой таблице отностся данная страница
            $mainUrl = 'albums'; // Основной урл

            $urlCheck = new UrlCheck();
            $urlCheckID = $urlCheck->id($url);
            $urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
            $urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['language']['all'] = $main->languages();
            Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


            $album = new Album();
            $albumData = $album->data($urlCheckID);

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


            return $this->render('album-page.min.php', [

                'albumData' => $albumData,
                'songsByAlbum' => $songsByAlbum,
                'artistByAlbum' => $artistByAlbum,
                'genres' => $genresByAlbum,

            ]);


        } else {

            $urlCheck = new UrlCheck();
            $urlCheckID = $urlCheck->id($url);

            $folder = ceil($urlCheckID / 1000);
            $path = '/view/albums/' . $folder . '/' . $urlCheckID . '/';
            $file = $url . '-' . Yii::$app->language . '.php';
            $array = $url . '-' . Yii::$app->language . '-array.php';

            $noDB = new NoDB();
            $urlCheckNoDB = $urlCheck->checkNoDB($noDB->realPath(), $path, $file);
            $fileDB = json_decode(file_get_contents($noDB->realPath() . $path . $array), TRUE);

            $languagesPath = '/view/languages/';
            $languagesArray = Yii::$app->language . '-array.php';
            $fileDBLanguages = json_decode(file_get_contents($noDB->realPath() . $languagesPath . $languagesArray), TRUE);

            Yii::$app->params['language'] = $fileDBLanguages['language'];
            Yii::$app->params['text'] = $fileDB['text'];
            Yii::$app->params['canonical'] = $fileDB['canonical'];
            Yii::$app->params['alternate'] = $fileDB['alternate'];
            Yii::$app->params['breadcrumbs'] = $fileDB['breadcrumbs'];

            //Перезаписываем каноникал так как допустили ошибку при генерации:
            //После перегенерирования удалить.
            //$main = new Main();
            //Yii::$app->params['canonical'] = $main->Canonical($url, 'artists');
            //
            //
            return $this->render('album-page-noDB.min.php', [

                'file' => $file,
                'path' => $path,

            ]);

        }


    }


}
