<?php

namespace common\components\index;


use Yii;

class ArtistsIndexLinksLetterLinkPrevNext
{


    function __construct($itemsCount, $pageSize, $getParams, $url){

        $letterLinkPrevNext = $this->letterLinkPrevNext($itemsCount, $pageSize, $getParams);
        $this->insertLinkPrevNextToGlobal($url, $pageSize, $letterLinkPrevNext);

    }

    public function letterLinkPrevNext($itemsCount, $pageSize, $getParams)
    {

        //echo $getParams['page'];
        $pagesCount = ceil($itemsCount / $pageSize);
        //echo $pagesCount;
        $letterLinkPrevNext['prev'] = 0;
        $letterLinkPrevNext['next'] = 0;

        if ($pagesCount == 1) {

            $letterLinkPrevNext['prev'] = 0;

            $letterLinkPrevNext['next'] = 0;

        }

        if ($pagesCount == 2) {

            if (!$getParams['page']) {

                $letterLinkPrevNext['prev'] = 0;

                $letterLinkPrevNext['next'] = 1;
            }

            if ($getParams['page'] == 1) {

                $letterLinkPrevNext['prev'] = 'self';

                $letterLinkPrevNext['next'] = 2;
            }

            if ($getParams['page'] == 2) {

                $letterLinkPrevNext['prev'] = 1;

                $letterLinkPrevNext['next'] = 0;
            }

        }

        if ($pagesCount > 2) {

            if (!$getParams['page']) {

                $letterLinkPrevNext['prev'] = 0;

                $letterLinkPrevNext['next'] = 1;
            }

            if ($getParams['page'] == 1) {

                $letterLinkPrevNext['prev'] = 'self';

                $letterLinkPrevNext['next'] = 2;
            }

            if ($getParams['page'] > 1 and $getParams['page'] < $pagesCount) {

                $letterLinkPrevNext['prev'] = $getParams['page'] - 1;

                $letterLinkPrevNext['next'] = $getParams['page'] + 1;
            }

            if ($getParams['page'] == $pagesCount) {

                $letterLinkPrevNext['prev'] = $pagesCount - 1;

                $letterLinkPrevNext['next'] = 0;
            }

        }

        //echo '<pre>';
        //print_r($letterLinkPrevNext);
        //echo '</pre>';

        return $letterLinkPrevNext;

    }

    function insertLinkPrevNextToGlobal($url, $pageSize, $letterLinkPrevNext){

        Yii::$app->params['prevNext'] = [

            'url' => 'index/artists/' . $url,
            'urlOne' => 'index/artists',
            'urlTwo' => $url,
            'pageSize' => $pageSize,
            'prev' => $letterLinkPrevNext['prev'],
            'next' => $letterLinkPrevNext['next'],

        ];

    }


}