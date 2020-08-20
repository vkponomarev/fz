<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class Artists
{

    function __construct($id = 0)
    {

    }

    function byRandom($count){

        return (new ArtistsByRandom())->artists($count);

    }

    function byPopularity($count){

        return (new ArtistsByPopularity())->artists($count);

    }

    function byFirstLetter($firstLetterByArtist, $pageSize){

        return (new ArtistsByFirstLetter())->artists($firstLetterByArtist, $pageSize);

    }

    function bySiteMap(){

        return (new ArtistsBySiteMap())->artists();

    }


    function byAll(){

        return (new ArtistsByAll())->artists();

    }

}

