<?php

namespace frontend\controllers;

use common\components\breadcrumbs\Breadcrumbs;
use common\components\getParams\GetParams;
use common\components\links\Links;
use common\components\main\Main;
use common\components\mLanguage\MLanguage;
use common\components\mLanguages\MLanguages;
use common\components\noDB\NoDB;
use common\components\pageTexts\PageTexts;
use common\components\songs\Songs;
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
class LanguagesController extends Controller
{


    public function actionIndex()
    {

        if (Yii::$app->params['usePagesDB']) {

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

        } else {

            $path = '/view/pages/languages/';
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
