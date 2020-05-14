<?php

namespace common\components\album;

class Album
{

    var $album; // Основная информация об альбоме.
    var $songs; // Список песен.
    var $artist; // Основная информация об артисте.

    function __construct($id = 0)
    {

    }

    function data($id)
    {

        return (new AlbumData())->albumData($id);

    }

    function songs($id)
    {

        return (new AlbumSongs())->albumSongs($id);

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

