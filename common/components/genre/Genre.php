<?php

namespace common\components\genre;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class Genre
{

    function __construct()
    {

    }


    function data($genreID)
    {

        return (new GenreData())->genre($genreID);

    }


}

