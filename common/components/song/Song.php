<?php

namespace common\components\song;

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
class Song
{

    var $song; // Вся информация о песне.

    function __construct()
    {

    }

    function data($id){

    return (new SongData())->data($id);

    }

}

