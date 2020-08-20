<?php

namespace frontend\controllers;

use common\components\album\Album;
use common\components\artist\Artist;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\mainPagesData\MainPagesData;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\translations\Translations;
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

        $songsByLyrics = $songs->byLyrics(10);
        $songsByTranslations = $songs->byTranslations(10, $mainPagesData->languageID);
        $songsByListen = $songs->byListen(20);

        return $this->render('index', [

            'songsByPopularity' => $songsByPopularity,
            'songsByLyrics' => $songsByLyrics,
            'songsByTranslations' => $songsByTranslations,
            'songsByListen' => $songsByListen,

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

        $songs = new Songs();
        $songsData = $songs->byArtist($artistData['id']);

        $featuring = new Featuring();
        $featuringBySong = $featuring->bySong($songData['id']);

        $pageTexts = new PageTexts();
        $pageTexts->updateBySong($songData);
        $pageTexts->updateByArtist($artistData);

        $firstLetter = new FirstLetter();
        $firstLetterByArtist = $firstLetter->byArtist($artistData);

        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->song($artistData, $albumData, $songData, $firstLetterByArtist);

        $translations = new Translations();
        $translationsBySong = $translations->bySong($songData['id']);
        $translationsByLanguages = $translations->byLanguages($songData['id']);


        $translation = new Translation();
        $translationByLanguage = $translation->byLanguage($translationsBySong, $mainPagesData->languageID);
        //(new \common\components\dump\Dump())->printR($translationByLanguage);

//(new \common\components\dump\Dump())->printR($featuringBySong);
        return $this->render('song-page', [

            'songData' => $songData,
            'songsData' => $songsData,
            'albumData' => $albumData,
            'artistData' => $artistData,
            'featuring' => $featuringBySong,
            'translationByLanguage' => $translationByLanguage,
            'translationsByLanguages' => $translationsByLanguages,

        ]);

    }


}
