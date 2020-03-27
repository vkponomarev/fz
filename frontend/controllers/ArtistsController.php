<?php
namespace frontend\controllers;

use common\components\artists\Artists;
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
class ArtistsController extends Controller
{


    public function actionIndex()
    {


        $mainPagesData = new MainPagesData('1',0, 0);




        return $this->render('index', [

            'showTestTable' => Artists::showTestTable(),

        ]);

    }

    public function actionArtistPage($url)
    {


        $mainPagesData = new MainPagesData('1',$url, 'm_artists');

        $artist = new Artists($mainPagesData->pageId);

        return $this->render('artist-page', [

            'artist' => $artist,

        ]);

    }



    public function actionIndexPage($url)
    {

        $mainPagesData = new MainPagesData('1',$url, 'm_artists_has_first_letter');



        return $this->render('artist-page', [

        ]);

    }








}
