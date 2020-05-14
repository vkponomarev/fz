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


    function data($id)
    {

        return (new AlbumsData())->albumData($id);

    }

    function songs($id)
    {

        return (new AlbumsSongs())->albumSongs($id);

    }

    function artists($id)
    {

        return (new AlbumsArtist())->albumsArtists($id);

    }

    function artist($id)
    {

        return (new AlbumsArtist())->albumArtist($id);

    }

    function listRandom()
    {

        return (new AlbumsListRandom())->albumsListRandom();

    }


    function breadcrumbs($id = 0, $artist = 0)
    {

        (new AlbumsBreadcrumbs($id, $artist));

    }


}

