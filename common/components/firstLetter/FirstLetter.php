<?php

namespace common\components\firstLetter;

use Yii;
use yii\web\NotFoundHttpException;

class FirstLetter
{

    var $firstLetter; // Основная информация об артисте.


    function __construct($id = 0)
    {

    }

    function data($id){

        return (new FirstLetterData())->firstLetter($id);

    }

    function byArtist($artistData){

        return (new FirstLetterByArtist())->firstLetter($artistData);

    }

}

