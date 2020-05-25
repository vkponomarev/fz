<?php

namespace common\components\breadcrumbs;

class Breadcrumbs
{

    function __construct()
    {

    }

    public function album($albumData, $artistData, $firstLetterByArtist)
    {

        (new BreadcrumbsAlbum())->breadcrumbs($albumData, $artistData, $firstLetterByArtist);

    }

    public function artist($artistData, $firstLetterData)
    {

        (new BreadcrumbsArtist())->breadcrumbs($artistData, $firstLetterData);

    }


    public function artistsByFirstLetter($firstLetterByArtist, $getParamsByLinksPrevNext)
    {

        (new BreadcrumbsArtistsByFirstLetter())->breadcrumbs($firstLetterByArtist, $getParamsByLinksPrevNext);

    }

    public function indexesByArtistsFirstLetters()
    {

        (new BreadcrumbsIndexesByArtistsFirstLetters())->breadcrumbs();

    }


    public function song($artistData, $albumData, $songData, $firstLetterByArtist)
    {

        (new BreadcrumbsSong())->breadcrumbs($artistData, $albumData, $songData, $firstLetterByArtist);

    }



}

