<?php

namespace frontend\controllers;

use common\components\artists\Artists;
use common\components\firstLetter\FirstLetter;
use common\components\index\ArtistsIndex;
use common\components\indexes\Indexes;
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


    public function actionArtistsIndex()
    {

        $mainPagesData = new MainPagesData('60', 0, 0);

        $indexes = new Indexes();
        $indexesByArtistsFirstLetter = $indexes->byArtistsFirstLetters();

        return $this->render('artists', [

            //'showTestTable' => Artists::showTestTable(),
            'indexesByArtistsFirstLetter' => $indexesByArtistsFirstLetter

        ]);

    }

    public function actionArtistsIndexPage($url)
    {

        $mainPagesData = new MainPagesData('61', $url, 'm_artists_first_letters');

        //$index = new Index();
        //$indexByArtistFirstLetter = $index->ByArtistFirstLetter();

        //$firstLetter = new FirstLetter();
        //$firstLetterByArtist = $firstLetter->byArtist($mainPagesData->pageId);

        //$artists = new Artists();
        //$artistsByFirstLetter = $artists->ByFirstLetter($firstLetterByArtist, 20);


        $artistsIndex = (new ArtistsIndex($mainPagesData->pageId, 50, $url));

        $artistsIndexLinksLetter = $artistsIndex->artistsIndexLinksLetter;

        $artistsIndexLinksLetterName = $artistsIndex->artistsIndexLinksLetterName;

        return $this->render('artists-page', [

            //artistsByFirstLetter' => $artistsByFirstLetter,
            'artistsIndexLinksLetter' => $artistsIndexLinksLetter,
            'artistsIndexLinksLetterName' => $artistsIndexLinksLetterName,

        ]);

    }


}
