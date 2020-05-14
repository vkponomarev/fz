<?php
namespace frontend\controllers;

use common\components\album\Album;
use common\components\albums\Albums;
use common\components\albums\AlbumsArtist;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\firstLetter\FirstLetter;
use common\components\mainPagesData\MainPagesData;
use common\components\songs\Songs;
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


        $mainPagesData = new MainPagesData('1',0, 0);

        $artist = new Artists();
        $artist = new Artists();

        return $this->render('index', [

            'showTestTable' => Artists::showTestTable(),

        ]);

    }

    public function actionArtistPage($url)
    {

        $mainPagesData = new MainPagesData('1', $url, 'm_artists');

        $artist = new Artist();
        $artistData = $artist->data($mainPagesData->pageId);

        $firstLetter = new FirstLetter();
        $firstLetterData = $firstLetter->artist($artistData['first_letter']);

        $albums = new Albums();
        $albumsData = $albums->byArtist($artistData['id']);

        $songs = new Songs();
        $artistSongs = $songs->byArtist($artistData['id']);

        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->artist($artistData, $firstLetterData);

        return $this->render('artist-page', [

            'artistData' => $artistData,
            'albumsData' => $albumsData,
            'artistSongs' => $artistSongs,
            //'artist' => $artist,

        ]);

    }

}
