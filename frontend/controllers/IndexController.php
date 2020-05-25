<?php
namespace frontend\controllers;

use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\firstLetter\FirstLetter;
use common\components\getParams\GetParams;
use common\components\indexes\Indexes;
use common\components\links\Links;
use common\components\mainPagesData\MainPagesData;
use common\components\pageTexts\PageTexts;
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

        $mainPagesData = new MainPagesData('60',0, 0);

        $indexes = new Indexes();
        $indexesByArtistsFirstLetter = $indexes->byArtistsFirstLetters();

        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->indexesByArtistsFirstLetters();

        return $this->render('artists', [

            //'showTestTable' => Artists::showTestTable(),
            'indexesByArtistsFirstLetter' => $indexesByArtistsFirstLetter

        ]);

    }

    public function actionArtistsIndexPage($url)
    {

        $mainPagesData = new MainPagesData('61',$url, 'm_artists_first_letters');

        $firstLetter = new FirstLetter();
        $firstLetterData = $firstLetter->data($mainPagesData->pageId);

        $artists = new Artists();
        $artistsByFirstLetter = $artists->ByFirstLetter($firstLetterData, 25);

        $getParams = new GetParams();
        $getParamsByLinksPrevNext = $getParams->byLinksPrevNext();

        $links = new Links();
        $linksPrevNext = $links->prevNext($artistsByFirstLetter['itemsCount'], 25, $getParamsByLinksPrevNext);
        $links->prevNextByArtistsFirstLetter($firstLetterData['url'], 25, $linksPrevNext);

        $breadCrumbs = new Breadcrumbs();
        $breadCrumbs->artistsByFirstLetter($firstLetterData, $getParamsByLinksPrevNext);

        $pageTexts = new PageTexts();
        $pageTexts->updateByArtistsIndex($getParamsByLinksPrevNext, $firstLetterData);
        

        return $this->render('artists-page', [

            'artistsByFirstLetter' => $artistsByFirstLetter['artists'],
            'firstLetterData' => $firstLetterData,

        ]);

    }










}
