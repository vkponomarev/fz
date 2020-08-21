<?php
namespace frontend\controllers;

use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\firstLetter\FirstLetter;
use common\components\getParams\GetParams;
use common\components\indexes\Indexes;
use common\components\links\Links;
use common\components\main\Main;
use common\components\mainPagesData\MainPagesData;
use common\components\pageTexts\PageTexts;
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
class IndexController extends Controller
{


    public function actionArtistsIndex()
    {

        $url = false;
        $textID = '60'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'artists/index'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $indexes = new Indexes();
        $indexesByArtistsFirstLetter = $indexes->byArtistsFirstLetters();

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->indexesByArtistsFirstLetters();

        return $this->render('artists', [

            //'showTestTable' => Artists::showTestTable(),
            'indexesByArtistsFirstLetter' => $indexesByArtistsFirstLetter

        ]);

    }

    public function actionArtistsIndexPage($url)
    {

        $textID = '61'; // ID из таблицы pages
        $table = 'm_artists_first_letters'; // К какой таблице отностся данная страница
        $mainUrl = 'artists/index'; // Основной урл

        $urlCheck = new UrlCheck();
        $urlCheckID = $urlCheck->id($url);
        $urlCheckTrueUrl = $urlCheck->trueUrl($urlCheckID, $table);
        $urlCheckCheck = $urlCheck->check($url, $urlCheckTrueUrl['url']);

        $main = new Main();
        Yii::$app->params['language'] = $main->language();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);


        $firstLetter = new FirstLetter();
        $firstLetterData = $firstLetter->data($urlCheckID);

        $artists = new Artists();
        $artistsByFirstLetter = $artists->ByFirstLetter($firstLetterData, 25);

        $getParams = new GetParams();
        $getParamsByLinksPrevNext = $getParams->byLinksPrevNext();

        $links = new Links();
        $linksPrevNext = $links->prevNext($artistsByFirstLetter['itemsCount'], 25, $getParamsByLinksPrevNext);
        $links->prevNextByArtistsFirstLetter($firstLetterData['url'], 25, $linksPrevNext);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->artistsByFirstLetter($firstLetterData, $getParamsByLinksPrevNext);

        $pageTexts = new PageTexts();
        $pageTexts->updateByArtistsIndex($getParamsByLinksPrevNext, $firstLetterData);
        

        return $this->render('artists-page', [

            'artistsByFirstLetter' => $artistsByFirstLetter['artists'],
            'firstLetterData' => $firstLetterData,

        ]);

    }










}
