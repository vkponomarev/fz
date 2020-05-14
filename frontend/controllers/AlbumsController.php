<?php
namespace frontend\controllers;

use common\components\artist\Artist;
use common\components\songs\Songs;
use common\components\album\Album;
use common\components\albums\Albums;
use common\components\breadcrumbs\Breadcrumbs;
use common\models\components\FlowPageAlbums;
use common\models\components\FlowPageArtists;
use common\models\components\WomanCalendars;
use common\models\Mail;
use common\components\mainPagesData\MainPagesData;
use common\models\Pages;
use common\models\Advertising;
use common\models\components\WomanCalculators;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


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

        $mainPagesData = new MainPagesData('1',0, 0);

        $albums = new Albums();
        $randomAlbums = $albums->listRandom();


        //$album->breadcrumbs($mainPagesData->pageId, $albumData);


        return $this->render('index', [

            'listRandom' => $randomAlbums,

        ]);

    }

    public function actionAlbumPage($url)
    {

        $mainPagesData = new MainPagesData('1', $url, 'm_albums');

        $album = new Album();
        $albumData = $album->data($mainPagesData->pageId);

        $songs = new Songs();
        $albumSongs = $songs->byAlbum($albumData['id']);

        $artist = new Artist();
        $artistData = $artist->data($albumData['m_artists_id']);

        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->album($albumData, $artistData);
        

        return $this->render('album-page', [

            'albumData' => $albumData,
            'albumSongs' => $albumSongs,
            'artistData' => $artistData,

        ]);

    }



}
