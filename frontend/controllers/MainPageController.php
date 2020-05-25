<?php
namespace frontend\controllers;


use common\components\albums\Albums;
use common\components\artists\Artists;
use common\components\mainPagesData\MainPagesData;
use common\components\song\Song;
use common\components\songs\Songs;
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

        $artists = new Artists();
        $artistByPopularity = $artists->byPopularity(8);

        $albums = new Albums();
        $albumsByPopularity = $albums->byPopularity(8);

        $songs = new Songs();
        $songsByPopularity = $songs->byPopularity(20);

        $song = new Song();
        $songByYoutube = $song->byYoutube();


        return $this->render('index', [

            'artistByPopularity' => $artistByPopularity,
            'albumsByPopularity' => $albumsByPopularity,
            'songsByPopularity' => $songsByPopularity,
            'songByYoutube' => $songByYoutube,

        ]);

    }

   


}
