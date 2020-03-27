<?php
namespace frontend\controllers;

use common\components\index\ArtistsIndex;
use common\components\index\ArtistsIndexLinks;
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
class IndexController extends Controller
{


    public function actionIndex()
    {


        $mainPagesData = new MainPagesData('1',0, 0);




        return $this->render('index', [

            //'showTestTable' => Artists::showTestTable(),
            'artistsIndexLinksAll' => (new ArtistsIndex())->artistsIndexLinks

        ]);

    }

    public function actionIndexPage($url)
    {


        $mainPagesData = new MainPagesData('1',$url, 'm_artists_first_letters');

        $artistsIndexLinksLetter = (new ArtistsIndex($mainPagesData->pageId, 50, $url))->artistsIndexLinksLetter;

        return $this->render('index-page', [

            'artistsIndexLinksLetter' => $artistsIndexLinksLetter['artistsIndexLinksLetter'],
            'itemsCount' => $artistsIndexLinksLetter['itemsCount']

        ]);

    }










}
