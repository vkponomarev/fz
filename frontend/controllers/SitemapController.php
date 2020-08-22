<?php

namespace frontend\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;
use yii;


class SitemapController extends Controller
{
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

    /**
     * / Без этого не будет работать
     * /*/

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
/*
        $frontend = Yii::getAlias('@frontend') ;
        $file = $frontend . '/views/gii/sitemap/main-files/sitemap_all.xml';
        \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        return Yii::$app->response->sendFile($file, null, ['mimeType' => 'xml']);
        //return $this->renderPartial($file);
*/
    }


    public function actionUrl($url)
    {
/*
        if (stripos($url, 'artists') !== false) {
            $path = 'artists';
        }

        if (stripos($url, 'albums') !== false) {
            $path = 'albums';
        }

        if (stripos($url, 'songs') !== false) {
            $path = 'songs';
        }

        $frontend = Yii::getAlias('@frontend') ;
        $file = $frontend . '/views/gii/sitemap/' . $path . '/' . $url;

        if (file_exists($file)) {
            return Yii::$app->response->sendFile($file);
        }
        throw new \Exception('File not found');
*/


    }

    public function actionIndexRu()
    {
/*
        $frontend = Yii::getAlias('@frontend') ;
        $file = $frontend . '/views/gii/sitemap/main-files/sitemap_ru.xml';

        return Yii::$app->response->sendFile($file);*/
    }


    public function actionUrlRu($url)
    {
/*
        if (stripos($url, 'artists') !== false) {
            $path = 'artists';
        }

        if (stripos($url, 'albums') !== false) {
            $path = 'albums';
        }

        if (stripos($url, 'songs') !== false) {
            $path = 'songs';
        }

        $frontend = Yii::getAlias('@frontend') ;
        $file = $frontend . '/views/gii/sitemap/ru/' . $path . '/' . $url;

        if (file_exists($file)) {
            return Yii::$app->response->sendFile($file);
        }

        throw new \Exception('File not found');
*/


    }

}
