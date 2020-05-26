<?php

namespace frontend\controllers;

use common\components\album\Album;
use common\components\artist\Artist;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\firstLetter\FirstLetter;
use common\components\mainPagesData\MainPagesData;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
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
class SongsController extends Controller
{


    public function actionIndex()
    {

        $mainPagesData = new MainPagesData('55', false, 0, 'songs');

        $songs = new Songs();
        $songsByPopularity = $songs->byPopularity(20);

        $song = new Song();
        $songByYoutube = $song->byYoutube();

        return $this->render('index', [

            'songsByPopularity' => $songsByPopularity,
            'songByYoutube' => $songByYoutube,

        ]);

    }

    public function actionSongPage($url)
    {

        $mainPagesData = new MainPagesData('58', $url, 'm_songs', 'songs');

        $song = new Song();
        $songData = $song->data($mainPagesData->pageId);

        $album = new Album();
        $albumData = $album->data($songData['m_albums_id']);

        $artist = new Artist();
        $artistData = $artist->data($songData['m_artists_id']);

        $pageTexts = new PageTexts();
        $pageTexts->updateBySong($songData);
        $pageTexts->updateByArtist($artistData);

        $firstLetter = new FirstLetter();
        $firstLetterByArtist = $firstLetter->byArtist($artistData);

        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->song($artistData, $albumData, $songData, $firstLetterByArtist);

        return $this->render('song-page', [

            'songData' => $songData,
            'albumData' => $albumData,
            'artistData' => $artistData,

        ]);

    }


}
