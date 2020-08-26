<?php

namespace frontend\controllers;


use common\components\song\Song;
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
class YoutubeController extends Controller
{


    public function actionIndex()
    {

        if(\Yii::$app->request->isAjax){

            $youtubeUrl = \Yii::$app->request->post('url');
            //$youtubeUrl = explode('=', $youtubeUrl);

            return $this->renderAjax('index', [
                'youtubeUrl'  => $youtubeUrl,
            ]);
        }

    }


}
