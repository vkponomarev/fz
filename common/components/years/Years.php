<?php

namespace common\components\years;

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
class Years
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

    function byArtist($id){

        return (new SongsByArtist())->songs($id);

    }


}

