<?php
namespace frontend\controllers;

use common\models\components\FlowPageAlbums;
use common\models\components\FlowPageArtists;
use common\models\components\WomanCalendars;
use common\models\Mail;
use common\models\mainPagesData\MainPagesData;
use common\models\Pages;
use common\models\Advertising;
use common\models\components\WomanCalculators;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Main controller
 * pageText($currentPage,$pageUsingKeys)
 *
 *
 *
 *
 */
class AlbumsController extends Controller
{


    public function actionIndex()
    {

        $mainPagesData = new MainPagesData('1',0, 0);



        return $this->render('index', [

            'showTestTable' => FlowPageAlbums::showTestTable(),

        ]);

    }

    public function actionAlbumPage($url)
    {

        $mainPagesData = new MainPagesData('1',$url, 'm_albums');


        return $this->render('album-page', [

        ]);

    }



}
