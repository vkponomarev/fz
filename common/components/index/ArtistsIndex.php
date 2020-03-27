<?php

namespace common\components\index;

use Yii;

class ArtistsIndex
{

    function __construct($firstLetterId = 0, $pageSize = 0, $url = 0)
    {

        if (!$firstLetterId)
            $this->artistsIndexLinks = $this->artistsIndexLinks();
        else {

            $this->artistsIndexLinksLetter = $this->artistsIndexLinksLetter($firstLetterId, $pageSize);

            $this->letterLinkPrevNext($this->artistsIndexLinksLetter['itemsCount'], $pageSize, $this->getParams(), $url);
        }

    }

    function artistsIndexLinks()
    {

        $artistsIndexLinks = (new ArtistsIndexLinks())->artistsIndexLinks();

        return $artistsIndexLinks;

    }

    function artistsIndexLinksLetter($firstLetterId, $pageSize)
    {

        $artistsIndexLinksLetter = (new ArtistsIndexLinksLetter())->artistsIndexLinksLetter($firstLetterId, $pageSize);

        return $artistsIndexLinksLetter;

    }

    function letterLinkPrevNext($itemsCount, $pageSize, $getParams, $url)
    {

        $letterLinkPrevNext = (new ArtistsIndexLinksLetterLinkPrevNext())->letterLinkPrevNext($itemsCount, $pageSize, $getParams);

        Yii::$app->params['prevNext'] = [

            'url' => 'index/artists/' . $url,
            'urlOne' => 'index/artists',
            'urlTwo' => $url,
            'pageSize' => $pageSize,
            'prev' => $letterLinkPrevNext['prev'],
            'next' => $letterLinkPrevNext['next'],


        ];

    }


    function getParams()
    {

        $getParams = (new ArtistsIndexGetParams())->getParams();

        return $getParams;

    }


}

