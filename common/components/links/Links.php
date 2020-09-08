<?php

namespace common\components\links;

class Links
{

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

    function prevNextByLanguage($url, $pageSize, $letterLinkPrevNext)
    {

        (new LinksPrevNextByLanguage())->links($url, $pageSize, $letterLinkPrevNext);

    }

}

