<?php

namespace frontend\controllers;

use common\components\albums\Albums;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\featuring\Featuring;
use common\components\firstLetter\FirstLetter;
use common\components\genre\Genre;
use common\components\genres\Genres;
use common\components\main\Main;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
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
class YearsController extends Controller
{


    public function actionIndex()
    {


        $url = false;
        $textID = '65'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'artists'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $genres = new Genres();
        $genresData = $genres->dataByMain();

        return $this->render('index.min.php', [

            'genresData' => $genresData,

        ]);


    }

    public function actionYearPage($url)
    {


        $textID = '66'; // ID из таблицы pages
        $table = 'm_genres'; // К какой таблице отностся данная страница
        $mainUrl = 'genres'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheckID = $urlCheck->id($url);
        $urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
        $urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $genre = new Genre();
        $genreData = $genre->data($urlCheckID);

        /*$artist = new Artist();
        $artistData = $artist->data($urlCheckID);*/

        $pageTexts = new PageTexts();
        $pageTexts->updateByGenre($genreData);

        /*$albums = new Albums();
        $albumsByArtist = $albums->byArtist($artistData['id']);

        $songs = new Songs();
        $songsByArtist = $songs->byArtist($artistData['id']);

        if ($songsByArtist) {
            $translation = new Translation();
            $translationCheckOrigin = $translation->checkOrigin($songsByArtist[0]['id'], Yii::$app->params['language']['current']['id']);
        } else {
            $translationCheckOrigin = false;
        }
        $featuring = new Featuring();
        $featuringByArtist = $featuring->byArtist($artistData['id']);

        $genres = new Genres();
        $genresByArtist = $genres->byArtist($artistData['id']);

        $songsByArtist = $songs->addFeaturing($songsByArtist, $featuringByArtist);

        $firstLetter = new FirstLetter();
        $firstLetterByArtist = $firstLetter->byArtist($artistData);*/

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->genre($genreData);

        return $this->render('year-page.min.php', [

            'genreData' => $genreData,


        ]);

    }

}
