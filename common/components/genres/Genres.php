<?php

namespace common\components\genres;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class Genres
{

    function __construct()
    {

    }


    function data($songID)
    {

        return (new GenresData())->genres();

    }

    function dataByMain()
    {

        return (new GenresDataByMain())->genres();

    }


    function bySong($songID)
    {

        return (new GenresBySong())->genres($songID);

    }

    function byArtist($artistID)
    {

        return (new GenresByArtist())->genres($artistID);

    }

    function byAlbum($artistID)
    {

        return (new GenresByAlbum())->genres($artistID);

    }

    function byParent($genreID)
    {

        return (new GenresByParent())->genres($genreID);

    }



}

