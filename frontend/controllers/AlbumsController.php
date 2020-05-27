<?php
namespace frontend\controllers;

use common\components\artist\Artist;
use common\components\firstLetter\FirstLetter;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\album\Album;
use common\components\albums\Albums;
use common\components\breadcrumbs\Breadcrumbs;
use common\models\components\FlowPageArtists;
use common\components\mainPagesData\MainPagesData;
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
        //albums = new Albums();
        $mainPagesData = new MainPagesData('54',false, 0, 'albums');

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

        $mainPagesData = new MainPagesData('57', $url, 'm_albums','albums');

        $album = new Album();
        $albumData = $album->data($mainPagesData->pageId);

        $songs = new Songs();
        $songsByAlbum = $songs->byAlbum($albumData['id']);

        $artist = new Artist();
        $artistData = $artist->data($albumData['m_artists_id']);

        $pageTexts = new PageTexts();
        $pageTexts->updateByAlbum($albumData);
        $pageTexts->updateByArtist($artistData);

        $firstLetter = new FirstLetter();
        $firstLetterByArtist = $firstLetter->byArtist($artistData);
        
        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->album($albumData, $artistData, $firstLetterByArtist);
        

        return $this->render('album-page', [

            'albumData' => $albumData,
            'songsByAlbum' => $songsByAlbum,
            'artistData' => $artistData,

        ]);

    }



}
