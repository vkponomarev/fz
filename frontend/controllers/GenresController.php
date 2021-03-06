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
use common\components\getParams\GetParams;
use common\components\links\Links;
use common\components\main\Main;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\translation\Translation;
use common\components\urlCheck\UrlCheck;
use Yii;
use yii\web\Controller;



class GenresController extends Controller
{


    public function actionIndex()
    {

        if (Yii::$app->params['usePagesDB']) {

        $url = false;
        $textID = '65'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'genres'; // Основной урл

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

        } else {

            $path = '/view/pages/genres/';
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

    public function actionGenrePage($url)
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

        $genres = new Genres();
        $genresByParent = $genres->byParent($urlCheckID);

        $songs = new Songs();
        $songsByGenre = $songs->byGenre($genreData['id'],40);

        $getParams = new GetParams();
        $getParamsByLinksPrevNext = $getParams->byLinksPrevNext();

        $links = new Links();
        $linksPrevNext = $links->prevNext($songsByGenre['itemsCount'], 40, $getParamsByLinksPrevNext);
        $links->prevNextByGenre($genreData['url'], 40, $linksPrevNext);

        $pageTexts = new PageTexts();
        $pageTexts->updateByGenreIndex($getParamsByLinksPrevNext, $genreData);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->genre($genreData);

        return $this->render('genre-page.min.php', [

            //'genreData' => $genreData,
            'songsByGenre' => $songsByGenre['songs'],
            'genresByParent' => $genresByParent,


        ]);

    }

}
