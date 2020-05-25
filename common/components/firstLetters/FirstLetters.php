<?php

namespace common\components\firstLetters;

use Yii;
use yii\web\NotFoundHttpException;

class FirstLetters
{

    var $firstLetters; // Основная информация об артисте.


    function __construct($id = 0)
    {

    }

    function byArtists(){

        return (new FirstLettersByArtists())->firstLetters();

    }


}

