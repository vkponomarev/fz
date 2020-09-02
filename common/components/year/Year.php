<?php

namespace common\components\year;

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
class Year
{

    function __construct()
    {

    }

    function data($yearID){

        return (new YearData())->data($yearID);

    }




}

