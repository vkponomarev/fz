<?php

namespace common\components\songs;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Class Songs
 * @package common\components\songs
 *
 * function byAlbum($id)
 * Все песни альбома
 *
 *
 */
class Songs
{

    var $songs; // Список песен.



    function __construct($id = 0)
    {

    }

    function byAlbum($id){

        return (new SongsByAlbum())->songs($id);

    }

    function byRandom(){

        return (new SongsByRandom())->songs();

    }

    function byPopularity($count){

        return (new SongsByPopularity())->songs($count);

    }

    function byArtist($id){

        return (new SongsByArtist())->songs($id);

    }

    function byArtistLimit($id){

        return (new SongsByArtistLimit())->songs($id);

    }

    function byGoogleTranslate($start, $end){

        return (new SongsByGoogleTranslate())->songs($start, $end);

    }


    function byStartEnd($start, $end){

        return (new SongsByStartEnd())->songs($start, $end);

    }

    function bySiteMap($start, $end){

        return (new SongsBySiteMap())->songs($start, $end);

    }

    function byListenMusicMainPage(){

        return (new SongsByListenMusicMainPage())->songs();

    }

    function byLyrics($count){

        return (new SongsByLyrics())->songs($count);

    }

    function byTranslations($count, $languageID){

        return (new SongsByTranslations())->songs($count, $languageID);

    }

    function byListen($count){

        return (new SongsByListen())->songs($count);

    }

    function byGenre($genreID, $pageSize){

        return (new SongsByGenre())->songs($genreID, $pageSize);

    }

    function byYear($yearID, $pageSize){

        return (new SongsByYear())->songs($yearID, $pageSize);

    }


    function addFeaturing($songs, $featuring){

        return (new SongsAddFeaturing())->songs($songs, $featuring);

    }

}

