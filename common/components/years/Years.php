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

    function __construct()
    {

    }

    function data(){

        return (new YearsData())->data();

    }


}

