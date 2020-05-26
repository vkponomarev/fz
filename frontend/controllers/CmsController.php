<?php
namespace frontend\controllers;


use common\components\mainPagesData\MainPagesData;
use yii\web\Controller;

/**
 * Main controller
 * pageText($currentPage,$pageUsingKeys)
 *
 *
 */
class CmsController extends Controller
{


    public function actionCookieInfo()
    {

        $mainPagesData = new MainPagesData('63',false, 'pages', 'cms/cookie');

        return $this->render('cookie-info', [

        ]);

    }

    public function actionPolicy()
    {

        $mainPagesData = new MainPagesData('64',false, 'pages', 'cms/policy');

        return $this->render('policy', [

        ]);

    }


}
