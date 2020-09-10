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
use common\components\year\Year;
use common\components\years\Years;
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

        if (Yii::$app->params['usePagesDB']) {
        $url = false;
        $textID = '67'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $years = new Years();
        $yearsData = $years->data();

        return $this->render('index.min.php', [

            'yearsData' => $yearsData,

        ]);

        } else {

            $path = '/view/pages/years/';
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

    public function actionYearPage($url)
    {


        $textID = '68'; // ID из таблицы pages
        $table = 'm_years'; // К какой таблице отностся данная страница
        $mainUrl = 'years'; // Основной урл

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

        $year = new Year();
        $yearData = $year->data($urlCheckID);

        $songs = new Songs();
        $songsByYear = $songs->byYear($yearData['id'], 40);

        $getParams = new GetParams();
        $getParamsByLinksPrevNext = $getParams->byLinksPrevNext();

        $links = new Links();
        $linksPrevNext = $links->prevNext($songsByYear['itemsCount'], 40, $getParamsByLinksPrevNext);
        $links->prevNextByYear($yearData['url'], 40, $linksPrevNext);

        $pageTexts = new PageTexts();
        $pageTexts->updateByYearIndex($getParamsByLinksPrevNext, $yearData);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->year($yearData);

        return $this->render('year-page.min.php', [


            'songsByYear' => $songsByYear['songs']

        ]);

    }

}
