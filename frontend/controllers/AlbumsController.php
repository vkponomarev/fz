<?php
namespace frontend\controllers;

use common\components\artist\Artist;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genres\Genres;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\album\Album;
use common\components\albums\Albums;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\urlCheck\UrlCheck;
use common\models\components\FlowPageArtists;
use common\components\mainPagesData\MainPagesData;
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

        $url = false;
        $textID = '54'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'albums'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $albums = new Albums();
        $albumsByPopularity = $albums->byPopularity(8);

        $song = new Song();
        $songByYoutube = $song->byYoutube();

        return $this->render('index', [

            'albumsByPopularity' => $albumsByPopularity,
            'songByYoutube' => $songByYoutube,

        ]);

    }

    public function actionAlbumPage($url)
    {

        $textID = '57'; // ID из таблицы pages
        $table = 'm_albums'; // К какой таблице отностся данная страница
        $mainUrl = 'albums'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheckID = $urlCheck->id($url);
        $urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
        $urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

        $main = new Main();
        Yii::$app->params['language'] = $main->language();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['id']);
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


        return $this->render('album-page', [

            'albumData' => $albumData,
            'songsByAlbum' => $songsByAlbum,
            'artistByAlbum' => $artistByAlbum,
            'genres' => $genresByAlbum,

        ]);

    }



}
