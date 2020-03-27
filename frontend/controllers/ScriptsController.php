<?php
namespace frontend\controllers;

use common\models\components\WomanCalendars;
use common\models\Mail;
use common\components\mainPagesData\MainPagesData;
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
class ScriptsController extends Controller
{


    public function actionIndex()
    {

        $mainPagesData = new MainPagesData('1',0, 0);

        return $this->render('index', [

        ]);

    }


    public function actionFirstLetter()
    {

        $mainPagesData = new MainPagesData('1',0, 0);

        return $this->render('first-letter', [

        ]);

    }

    public function actionGenres()
    {

        $mainPagesData = new MainPagesData('1',0, 0);

        return $this->render('genres', [

        ]);

    }


    public function actionYears()
    {

        $mainPagesData = new MainPagesData('1',0, 0);

        return $this->render('years', [

        ]);

    }

    public function actionAlbums()
    {

        $mainPagesData = new MainPagesData('1', 0, 0);

        return $this->render('albums', [

        ]);
    }

        public function actionArtists()
    {

        $mainPagesData = new MainPagesData('1',0, 0);

        return $this->render('artists', [

        ]);

    }

}
