<?php

namespace common\components\song;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
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

    function byYoutube(){

        return (new SongByYoutube())->song();

    }

    function updatePageTexts($songData){

        (new SongUpdatePageTexts())->update($songData);

    }

}

