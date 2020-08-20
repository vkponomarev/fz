<?php

namespace common\components\albums;

class Albums
{

    var $album; // Основная информация об альбоме.
    var $songs; // Список песен.
    var $artist; // Основная информация об артисте.

    function __construct($id = 0)
    {

    }

    function byArtist($id)
    {

        return (new AlbumsByArtist())->albums($id);

    }

    function byRandom($count)
    {

        return (new AlbumsByRandom())->albums($count);

    }

    function byPopularity($count)
    {

        return (new AlbumsByPopularity())->albums($count);

    }

    function bySiteMap()
    {

        return (new AlbumsBySiteMap())->albums();

    }


    function byStartEnd($start, $end)
    {

        return (new AlbumsByStartEnd())->albums($start, $end);

    }


}

