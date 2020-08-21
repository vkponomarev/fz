<?php

namespace frontend\controllers;

use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\artists\Artists;
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
class ArtistsController extends Controller
{


    public function actionIndex()
    {

        if (Yii::$app->params['usePagesDB']) {

            $url = false;
            $textID = '2'; // ID из таблицы pages
            $table = 0; // К какой таблице отностся данная страница
            $mainUrl = 'artists'; // Основной урл

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

            $artists = new Artists();
            $artistsByPopularity = $artists->byPopularity(8);

            $song = new Song();
            $songByYoutube = $song->byYoutube();

            return $this->render('index', [

                'artistsByPopularity' => $artistsByPopularity,
                'songByYoutube' => $songByYoutube,

            ]);

        } else {

            $path = '/view/pages/artists/';
            $file = Yii::$app->language . '.php';
            $array = Yii::$app->language . '-array.php';

            $noDB = new NoDB();
            $fileDB = json_decode(file_get_contents($noDB->realPath() . $path . $array), TRUE);

            Yii::$app->params['language'] = $fileDB['language'];
            Yii::$app->params['text'] = $fileDB['text'];
            Yii::$app->params['canonical'] = $fileDB['canonical'];
            Yii::$app->params['alternate'] = $fileDB['alternate'];

            return $this->render('index-noDB', [

                'file' => $file,
                'path' => $path,

            ]);

        }

    }

    public function actionArtistPage($url)
    {

        if (Yii::$app->params['useArtistsDB']) {

            $textID = '56'; // ID из таблицы pages
            $table = 'm_artists'; // К какой таблице отностся данная страница
            $mainUrl = 'artists'; // Основной урл

            $urlCheck = new UrlCheck();
            $urlCheckID = $urlCheck->id($url);
            $urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
            $urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

            $artist = new Artist();
            $artistData = $artist->data($urlCheckID);

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

            return $this->render('artist-page', [

                'artistData' => $artistData,
                'albumsByArtist' => $albumsByArtist,
                'songsByArtist' => $songsByArtist,
                'genres' => $genresByArtist,

            ]);
        } else {


            $urlCheck = new UrlCheck();
            $urlCheckID = $urlCheck->id($url);

            $folder = ceil($urlCheckID / 1000);
            $path = '/view/artists/' . $folder . '/' . $urlCheckID . '/';
            $file = $url . '-' . Yii::$app->language . '.php';
            $array = $url . '-' . Yii::$app->language . '-array.php';

            $noDB = new NoDB();
            $fileDB = json_decode(file_get_contents($noDB->realPath() . $path . $array), TRUE);



            Yii::$app->params['language'] = $fileDB['language'];
            Yii::$app->params['text'] = $fileDB['text'];
            Yii::$app->params['canonical'] = $fileDB['canonical'];
            Yii::$app->params['alternate'] = $fileDB['alternate'];
            Yii::$app->params['breadcrumbs'] = $fileDB['breadcrumbs'];

            //Перезаписываем каноникал так как допустили ошибку при генерации:
            //После перегенерирования удалить.
            $main = new Main();
            Yii::$app->params['canonical'] = $main->Canonical($url, 'artists');
            //
            //
            return $this->render('artist-page-noDB', [

                'file' => $file,
                'path' => $path,

            ]);

        }
    }

}
