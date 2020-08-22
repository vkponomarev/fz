<?php

namespace backend\controllers;

use common\components\gii\siteMap\SiteMap;
use common\components\languages\Languages;
use common\components\textRedactors\TextNumericCopy;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;


class SiteMapController extends Controller
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

        if ($name = Yii::$app->request->post('name')) {

            $siteMap = new SiteMap();

            $languages = new Languages();
            $languagesData = $languages->data();

            if ($name == 'sitemap-artists-all') {

                //$siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/all/');
                //$siteMap->generateArtists($languagesData);

            }

            if ($name == 'sitemap-artists-ru') {

                //(new \common\components\dump\Dump())->printR($name);
                //$siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/ru/artists/');
                //$siteMap->generateArtistsRU($languagesData);

            }


            if ($name == 'sitemap-albums-all') {

                //$siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/albums/');
                //$siteMap->generateAlbums(1, 85000, $languagesData);

            }

            if ($name == 'sitemap-albums-ru') {

                //(new \common\components\dump\Dump())->printR($name);
                //$siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/ru/albums/');
                //$siteMap->generateAlbumsRU($languagesData);

            }

            if ($name == 'sitemap-songs-all') {

                //$siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/songs/');
                $siteMap->generateSongs(2200000, 2300000, $languagesData);

            }

            if ($name == 'sitemap-songs-ru') {

                //(new \common\components\dump\Dump())->printR($name);
                //$siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/ru/songs/');
                //$siteMap->generateSongsRU(2200000, 2300000,$languagesData);

            }

            if (($name == 'sitemap-all') or ($name == 'sitemap-ru')) {

               // $siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/all/');
                $siteMap->generateMainFiles();

            }

        }

        return $this->render('index', [

        ]);


    }


}
