<?php

namespace common\components\artist;

use Yii;
use yii\web\NotFoundHttpException;

class Artist
{

    var $artist; // Основная информация об артисте.


    function __construct($id = 0)
    {

    }

    function data($id){

    return (new ArtistData())->data($id);

    }

    function byAlbum($id){

        return (new ArtistByAlbum())->artist($id);

    }

    function bySong($id){

        return (new ArtistBySong())->artist($id);

    }

    function updatePageTexts($artistData){

        (new ArtistUpdatePageTexts())->update($artistData);

    }


}

