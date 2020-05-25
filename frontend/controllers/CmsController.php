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
class CmsController extends Controller
{


    public function actionCookieInfo()
    {

        $mainPagesData = new MainPagesData('63','', 'pages');

        return $this->render('cookie-info', [

        ]);

    }

    public function actionPolicy()
    {

        $mainPagesData = new MainPagesData('64','', 'pages');

        return $this->render('policy', [

        ]);

    }


}
