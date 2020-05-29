<?php

namespace backend\controllers;

use common\components\albums\Albums;
use common\components\artists\Artists;
use common\components\gii\createViewPartials\alternate\CreateMainPage;
use common\components\gii\createViewPartials\CreateRawData;
use common\components\gii\createViewPartials\CreateViewPartials;
use common\components\song\Song;
use common\components\songs\Songs;
use common\components\textRedactors\TextNumericCopy;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * MailController implements the CRUD actions for Mail model.
 */
class CreateViewPartialsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }



    public function actionCreateMainPage()
    {



        $artists = new Artists();
        $artistByPopularity = $artists->byPopularity(8);

        $albums = new Albums();
        $albumsByPopularity = $albums->byPopularity(8);

        $songs = new Songs();
        $songsByPopularity = $songs->byPopularity(20);

        $song = new Song();
        $songByYoutube = $song->byYoutube();



        $createRawData = new CreateRawData();

        $createRawData->create($artistByPopularity , 'artistByPopularity');

        /*
        $artistByPopularity
        $albumsByPopularity
        $songsByPopularity
        $songByYoutube
        */

        return $this->render('index', [


        ]);


    }


    public function actionIndex()
    {

        if (Yii::$app->request->post('name')){

            (new CreateViewPartials(Yii::$app->request->post('name')));

        }
        return $this->render('index', [


        ]);


    }


    public function actionNumericCopy()
    {

        $TextNumericCopy = 0;

        /* if ($get) {
             $TextNumericCopy = new TextNumericCopy($pageID);
             $textNumericCopy->save($textNumericCopy->execute($get));
         }*/
        echo 'Контроллер' . '<br>';
        echo Yii::$app->request->post('id');
        if (Yii::$app->request->post('id')) {
            echo 'Есть ID' . '<br>';
            $pagesID = Yii::$app->request->post('id');
            $numberKeys = Yii::$app->request->post('numberKeys');
            $textKeys = Yii::$app->request->post('textKeys');
            $text = Yii::$app->request->post('text');
            $languageID = Yii::$app->request->post('language');

            (new TextNumericCopy($pagesID, $numberKeys, $textKeys, $text, $languageID));

        }


        return $this->render('index', [

            'createCalculator' => false,
            //'languages' => $languages,

        ]);


    }

}