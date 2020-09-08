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
use common\components\mLanguage\MLanguage;
use common\components\mLanguages\MLanguages;
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
class LanguagesController extends Controller
{


    public function actionIndex()
    {


        $url = false;
        $textID = '69'; // ID из таблицы pages
        $table = 0; // К какой таблице отностся данная страница
        $mainUrl = 'languages'; // Основной урл

        $main = new Main();
        Yii::$app->params['language'] = $main->language(Yii::$app->language);
        Yii::$app->params['language']['all'] = $main->languages();
        Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
        Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
        Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

        $MLanguages = new MLanguages();
        $MLanguagesData = $MLanguages->data(Yii::$app->params['language']['current']['id']);

        return $this->render('index.min.php', [

            'MLanguagesData' => $MLanguagesData,

        ]);


    }

    public function actionLanguagePage($url)
    {


        $textID = '70'; // ID из таблицы pages
        $table = 'm_languages'; // К какой таблице отностся данная страница
        $mainUrl = 'languages'; // Основной урл

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

        $mLanguage = new MLanguage();
        $mLanguageData = $mLanguage->data(Yii::$app->params['language']['current']['id'], $urlCheckID);

        $songs = new Songs();
        $songsByLanguage = $songs->byLanguage($mLanguageData['id'], 40);

        $getParams = new GetParams();
        $getParamsByLinksPrevNext = $getParams->byLinksPrevNext();

        $links = new Links();
        $linksPrevNext = $links->prevNext($songsByLanguage['itemsCount'], 40, $getParamsByLinksPrevNext);
        $links->prevNextByLanguage($mLanguageData['url'], 40, $linksPrevNext);

        $pageTexts = new PageTexts();
        $pageTexts->updateByLanguageIndex($getParamsByLinksPrevNext, $mLanguageData);

        $breadCrumbs = new Breadcrumbs();
        Yii::$app->params['breadcrumbs'] = $breadCrumbs->language($mLanguageData);

        return $this->render('language-page.min.php', [

            'songsByLanguage' => $songsByLanguage['songs']

        ]);

    }

}
