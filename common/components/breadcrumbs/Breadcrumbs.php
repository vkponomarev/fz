<?php

namespace common\components\breadcrumbs;

class Breadcrumbs
{

    function __construct()
    {

    }

    public function album($albumData, $artistData)
    {

        (new BreadcrumbsAlbum())->breadcrumbs($albumData, $artistData);

    }

    public function artist($artistData, $firstLetterData)
    {

        (new BreadcrumbsArtist())->breadcrumbs($artistData, $firstLetterData);

    }

}

