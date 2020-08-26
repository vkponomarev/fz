<?php

namespace frontend\controllers;


use common\components\albums\Albums;
use common\components\artists\Artists;
use common\components\main\Main;
use common\components\noDB\NoDB;
use common\components\songs\Songs;
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
class MainPageController extends Controller
{


    public function actionIndex()
    {

        if (Yii::$app->params['usePagesDB']) {

            $url = false;
            $textID = '1'; // ID из таблицы pages
            $table = 'pages'; // К какой таблице отностся данная страница
            $mainUrl = false; // Основной урл

            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['language']['all'] = $main->languages();
            Yii::$app->params['text'] = $main->text($textID, Yii::$app->params['language']['current']['id']);
            Yii::$app->params['canonical'] = $main->Canonical($url, $mainUrl);
            Yii::$app->params['alternate'] = $main->Alternate($url, $mainUrl);

            $artists = new Artists();
            $artistByPopularity = $artists->byPopularity(8);

            $albums = new Albums();
            $albumsByPopularity = $albums->byPopularity(8);

            $songs = new Songs();
            $songsByListenMusic = $songs->byListenMusicMainPage();
            $songsByPopularity = $songs->byPopularity(20);

            return $this->render('index.min.php', [

                'artistByPopularity' => $artistByPopularity,
                'albumsByPopularity' => $albumsByPopularity,
                'songsByPopularity' => $songsByPopularity,
                'songsByListenMusic' => $songsByListenMusic,

            ]);

        } else {

            $path = '/view/pages/index/';
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


}
