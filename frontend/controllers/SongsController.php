<?php

namespace frontend\controllers;

use common\components\album\Album;
use common\components\artist\Artist;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genres\Genres;
use common\components\main\Main;
use common\components\mLanguage\MLanguage;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\translations\Translations;
use common\components\urlCheck\UrlCheck;
use common\components\year\Year;
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

        if (Yii::$app->params['usePagesDB']) {

            $url = 0;
            $textID = '55'; // ID из таблицы pages
            $table = 0; // К какой таблице отностся данная страница
            $mainUrl = 'songs'; // Основной урл

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['language']['all'] = $main->languages();
            Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


            $songs = new Songs();
            $songsByPopularity = $songs->byPopularity(20);

            $songsByLyrics = $songs->byLyrics(10);
            $songsByTranslations = $songs->byTranslations(10, Yii::$app->params['language']['id']);
            $songsByListen = $songs->byListen(20);

            return $this->render('index.min.php', [

                'songsByPopularity' => $songsByPopularity,
                'songsByLyrics' => $songsByLyrics,
                'songsByTranslations' => $songsByTranslations,
                'songsByListen' => $songsByListen,

            ]);

        } else {

            $path = '/view/pages/songs/';
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

    public function actionSongPage($url)
    {

        if (Yii::$app->params['useSongsDB']) {


            $table = 'm_songs'; // К какой таблице относится данная страница
            $mainUrl = 'songs'; // Основной урл https://flowlez.com/ru/songs/

            $urlCheck = new UrlCheck();
            $urlCheckID = $urlCheck->id($url);
            $urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
            $urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['language']['all'] = $main->languages();
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


            $song = new Song();
            $songData = $song->data($urlCheckID);

            $year = new Year();
            $yearBySong = $year->bySong($songData['m_years_id']);

            $mLanguage = new MLanguage();
            $mLanguageBySong = $mLanguage->bySong(Yii::$app->params['language']['current']['id'], $songData['m_languages_id']);

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


            $firstLetter = new FirstLetter();
            $firstLetterByArtist = $firstLetter->byArtist($artistBySong);

            $breadCrumbs = new Breadcrumbs();
            Yii::$app->params['breadcrumbs'] = $breadCrumbs->song($artistBySong, $albumData, $songData, $firstLetterByArtist);

            $translations = new Translations();
            $translationsByLanguages = $translations->byLanguages($songData['id']);

            $translation = new Translation();
            $translationByLanguage = $translation->byLanguage($songData['id'], Yii::$app->params['language']['id']);

            //(new \common\components\dump\Dump())->printR($translationByLanguage);

            $pageTexts = new PageTexts();
            $pageTexts->songCondition(
                Yii::$app->params['language']['current']['id'],
                $songData,
                $translationByLanguage
                );
            $pageTexts->updateBySong($songData);
            $pageTexts->updateByArtist($artistBySong);


            return $this->render('song-page.min.php', [

                'songData' => $songData,
                'songsData' => $songsData,
                'albumData' => $albumData,
                'artistBySong' => $artistBySong,
                'yearBySong' => $yearBySong,
                'mLanguageBySong' => $mLanguageBySong,
                'featuring' => $featuringBySong,
                'genres' => $genresBySong,
                'translationByLanguage' => $translationByLanguage,
                'translationsByLanguages' => $translationsByLanguages,


            ]);

        } else {

            $urlCheck = new UrlCheck();
            $urlCheckID = $urlCheck->id($url);

            $folder = ceil($urlCheckID / 1000);
            $path = '/view/songs/' . $folder . '/' . $urlCheckID . '/';
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

            return $this->render('song-page-noDB.min.php', [

                'file' => $file,
                'path' => $path,

            ]);

        }

    }


}
