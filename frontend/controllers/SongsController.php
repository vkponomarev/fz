<?php

namespace frontend\controllers;

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
class SongsController extends Controller
{


    public function actionIndex()
    {

        $mainPagesData = new MainPagesData('1', 0, 0);

        $songs = new Songs();
        $songsByRandom = $songs->byRandom();

        return $this->render('index', [

            'songsByRandom' => $songsByRandom,

        ]);

    }

    public function actionSongPage($url)
    {

        $mainPagesData = new MainPagesData('1', $url, 'm_songs');

        $song = new Song();

        $songData = $song->data($mainPagesData->pageId);

        return $this->render('song-page', [

            'songData' => $songData,

        ]);

    }


}
