<?php

namespace backend\controllers;

use common\components\gii\siteMap\SiteMap;
use common\components\gii\view\View;
use common\components\languages\Languages;
use common\components\textRedactors\TextNumericCopy;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;


class GiiViewController extends Controller
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

    /*
sitemap-artists-all
sitemap-albums-all
sitemap-songs-all
sitemap-all

sitemap-artists-ru
sitemap-albums-ru
sitemap-songs-ru
sitemap-ru
*/
    public function actionIndex()
    {

        /**
         * 1. Создаем файлы для артистов
         * 2. Создаем файлы для альбомов
         * 3. Создаем файлы для песен
         * 4. Создаем файл индекса карты сайтов
         */
        if ($name = Yii::$app->request->post('name')) {

            $valueOne = Yii::$app->request->post('value-one');
            $valueTwo = Yii::$app->request->post('value-two');

            $view = new View();
            $languages = new Languages();
            $languagesData = $languages->data();

            //<option value="artists-delete">Удаление всех файлов Артистов</option>
            if ($name == 'artists-delete') {

                $view->cleanPath($view->realPath() . '/view/artists/');

            }
            //<option value="albums-delete">Удаление всех файлов Альбомов</option>
            if ($name == 'albums-delete') {

                $view->cleanPath($view->realPath() . '/view/albums/');

            }

            //<option value="songs-delete">Удаление всех файлов Песен</option>
            if ($name == 'songs-delete') {

                $view->cleanPath($view->realPath() . '/view/songs/');

            }

            if ($name == 'pages-delete') {

                $view->cleanPath($view->realPath() . '/view/pages/');

            }
            //<option value="artists-create">Создание файлов Артистов</option>
            if ($name == 'artists-create') {

                $view->generateArtists($valueOne, $valueTwo, $languagesData);

            }
            //<option value="albums-create">Создание файлов Альбомов</option>
            if ($name == 'albums-create') {

                $view->generateAlbums($valueOne, $valueTwo, $languagesData);

            }
            //<option value="songs-create">Создание файлов Песен</option>
            if ($name == 'songs-create') {

                $view->generateSongs($valueOne, $valueTwo, $languagesData);

            }

            if ($name == 'languages-create') {

                $view->generateLanguages($languagesData);

            }

            if ($name == 'pages-create') {

                
                $view->generatePages($languagesData);

            }


        }

        return $this->render('index', [

        ]);


    }


}
