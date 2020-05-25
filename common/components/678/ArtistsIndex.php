<?php

namespace common\components\index;

use Yii;

class ArtistsIndex
{

    var $artistsIndexLinks; // Все ссылки на первую букву артистов
    var $artistsIndexLinksLetter; // Все ссылки на артистов на кокретную первую букву в виде дата провайдера
    var $artistsIndexLinksLetterName; // Название конкретной Буквы для страницы этой буквы для крошек

    function __construct($firstLetterId = 0, $pageSize = 0, $url = 0)
    {

        if (!$firstLetterId)
            $this->artistsIndexLinks = $this->artistsIndexLinks();
        else {

            $this->artistsIndexLinksLetter = $this->artistsIndexLinksLetter($firstLetterId, $pageSize);

            $this->artistsIndexLinksLetterName = $this->artistsIndexLinksLetterName($firstLetterId);

            //Записываем в глобальную переменную текущие ссылки rel=prev и rel=next Yii::$app->params['prevNext']
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

        (new ArtistsIndexLinksLetterLinkPrevNext($itemsCount, $pageSize, $getParams, $url));

    }


    function getParams()
    {

        $getParams = (new ArtistsIndexGetParams())->getParams();

        return $getParams;

    }    
    
    function artistsIndexLinksLetterName($firstLetterId)
    {

    return (new ArtistsIndexLinksLetterName())->artistsIndexLinksName($firstLetterId);

}


}

