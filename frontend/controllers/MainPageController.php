<?php
namespace frontend\controllers;


use common\components\mainPagesData\MainPagesData;
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

        $mainPagesData = new MainPagesData('1',0,0);



        return $this->render('index', [



        ]);

    }

   


}
