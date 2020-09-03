<?php

namespace common\components\links;

class Links
{

    var $artistsIndexLinks; // Все ссылки на первую букву артистов
    var $artistsIndexLinksLetter; // Все ссылки на артистов на кокретную первую букву в виде дата провайдера
    var $artistsIndexLinksLetterName; // Название конкретной Буквы для страницы этой буквы для крошек

    function __construct()
    {

    }

    function prevNext($itemsCount, $pageSize, $getParams)
    {

        return (new LinksPrevNext())->links($itemsCount, $pageSize, $getParams);

    }

    function prevNextByArtistsFirstLetter($url, $pageSize, $letterLinkPrevNext)
    {

        (new LinksPrevNextByArtistsFirstLetter())->links($url, $pageSize, $letterLinkPrevNext);

    }

    function prevNextByGenre($url, $pageSize, $letterLinkPrevNext)
    {

        (new LinksPrevNextByGenre())->links($url, $pageSize, $letterLinkPrevNext);

    }

    function prevNextByYear($url, $pageSize, $letterLinkPrevNext)
    {

        (new LinksPrevNextByYear())->links($url, $pageSize, $letterLinkPrevNext);

    }


}

