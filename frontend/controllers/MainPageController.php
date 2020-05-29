<?php
namespace frontend\controllers;


use common\components\albums\Albums;
use common\components\artists\Artists;
use common\components\gii\createViewPartials\CreateRawData;
use common\components\mainPagesData\MainPagesData;
use common\components\song\Song;
use common\components\songs\Songs;
use yii\helpers\ArrayHelper;
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

        $mainPagesData = new MainPagesData('1',false,0, false);

        $artists = new Artists();
        $artistByPopularity = $artists->byPopularity(8);

        $albums = new Albums();
        $albumsByPopularity = $albums->byPopularity(8);

        $songs = new Songs();
        $songsByPopularity = $songs->byPopularity(20);

        $song = new Song();
        $songByYoutube = $song->byYoutube();
        //(new \common\components\dump\Dump())->printR($songByYoutube);
/*
        $createRawData = new CreateRawData();
        $fileRaw = $createRawData->startFile();
        $fileRaw = $fileRaw . $createRawData->create($artistByPopularity , 'artistByPopularity');
        $fileRaw = $fileRaw . $createRawData->create($albumsByPopularity , 'albumsByPopularity');
        $fileRaw = $fileRaw . $createRawData->create($songsByPopularity , 'songsByPopularity');
        $fileRaw = $fileRaw . $createRawData->create($songsByPopularity , 'songsByPopularity');
        $fileRaw = $fileRaw . $createRawData->create($songByYoutube , 'songByYoutube');
        $fileRaw = $fileRaw . $createRawData->endFile();
        $filePath = $createRawData->path('partials/view/main-page/');
        $createRawData->save($fileRaw,$filePath,'_main-page.php');

        //(new \common\components\dump\Dump())->printR($rawFile);

        $test = ArrayHelper::htmlDecode(
            require __DIR__ . '/../../frontend/views/partials/view/main-page/_main-page.php'
        );
*/
        //(new \common\components\dump\Dump())->printR($test);

        return $this->render('index', [

            'artistByPopularity' => $artistByPopularity,
            'albumsByPopularity' => $albumsByPopularity,
            'songsByPopularity' => $songsByPopularity,
            'songByYoutube' => $songByYoutube,
            /*
                        'artistByPopularity' => $test['artistByPopularity'],
                        'albumsByPopularity' => $test['albumsByPopularity'],
                        'songsByPopularity' => $test['songsByPopularity'],
                        'songByYoutube' => $test['songByYoutube'],
            */
        ]);

    }

   


}
