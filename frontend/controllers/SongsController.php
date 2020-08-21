<?php

namespace frontend\controllers;

use common\components\album\Album;
use common\components\artist\Artist;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genres\Genres;
use common\components\main\Main;
use common\components\mainPagesData\MainPagesData;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\translations\Translations;
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
class SongsController extends Controller
{


    public function actionIndex()
    {

        $url = 0;
        $textID = '55'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'songs'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


        $songs = new Songs();
        $songsByPopularity = $songs->byPopularity(20);

        $songsByLyrics = $songs->byLyrics(10);
        $songsByTranslations = $songs->byTranslations(10, Yii::$app->params['language']['id']);
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

        $textID = '58'; // ID из таблицы pages
        $table = 'm_songs'; // К какой таблице относится данная страница
        $mainUrl = 'songs'; // Основной урл https://flowlez.com/ru/songs/

        $urlCheck = new UrlCheck();
        $urlCheckID = $urlCheck->id($url);
        $urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
        $urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

        $main = new Main();
        Yii::$app->params['language'] = $main->language();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


        $song = new Song();
        $songData = $song->data($urlCheckID);

        $album = new Album();
        $albumData = $album->data($songData['m_albums_id']);

        $artist = new Artist();
        $artistBySong = $artist->bySong($songData['m_artists_id']);

        $songs = new Songs();
        $songsData = $songs->byArtistLimit($artistBySong['id']);

        $featuring = new Featuring();
        $featuringBySong = $featuring->bySong($songData['id']);

        $genres = new Genres();
        $genresBySong = $genres->bySong($songData['id']);

        $pageTexts = new PageTexts();
        $pageTexts->updateBySong($songData);
        $pageTexts->updateByArtist($artistBySong);

        $firstLetter = new FirstLetter();
        $firstLetterByArtist = $firstLetter->byArtist($artistBySong);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->song($artistBySong, $albumData, $songData, $firstLetterByArtist);

        $translations = new Translations();
        $translationsByLanguages = $translations->byLanguages($songData['id']);

        $translation = new Translation();
        $translationByLanguage = $translation->byLanguage($songData['id'], Yii::$app->params['language']['id']);

        return $this->render('song-page', [

            'songData' => $songData,
            'songsData' => $songsData,
            'albumData' => $albumData,
            'artistBySong' => $artistBySong,
            'featuring' => $featuringBySong,
            'genres' => $genresBySong,
            'translationByLanguage' => $translationByLanguage,
            'translationsByLanguages' => $translationsByLanguages,

        ]);

    }


}
