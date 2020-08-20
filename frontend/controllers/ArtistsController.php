<?php
namespace frontend\controllers;

use common\components\albums\Albums;
use common\components\albums\AlbumsArtist;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\firstLetter\FirstLetter;
use common\components\mainPagesData\MainPagesData;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
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


        $mainPagesData = new MainPagesData('2',false, 0, 'artists');

        $artists = new Artists();
        $artistsByPopularity = $artists->byPopularity(8);

        $song = new Song();
        $songByYoutube = $song->byYoutube();

        return $this->render('index', [

            'artistsByPopularity' => $artistsByPopularity,
            'songByYoutube' => $songByYoutube,

        ]);

    }

    public function actionArtistPage($url)
    {

        $mainPagesData = new MainPagesData('56', $url, 'm_artists', 'artists');

        $artist = new Artist();
        $artistData = $artist->data($mainPagesData->pageId);

        $pageTexts = new PageTexts();
        $pageTexts->updateByArtist($artistData);

        $albums = new Albums();
        $albumsByArtist = $albums->byArtist($artistData['id']);

        $songs = new Songs();
        $songsByArtist = $songs->byArtist($artistData['id']);

        $firstLetter = new FirstLetter();
        $firstLetterByArtist = $firstLetter->byArtist($artistData);

        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->artist($artistData, $firstLetterByArtist);

        return $this->render('artist-page', [

            'artistData' => $artistData,
            'albumsByArtist' => $albumsByArtist,
            'songsByArtist' => $songsByArtist,

        ]);

    }

}
