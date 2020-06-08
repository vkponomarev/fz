<?php

namespace common\components\search;

use Yii;
use yii\web\NotFoundHttpException;

/**
 *
 *
 *
 */
class Search
{

    function __construct()
    {

    }

    function byArtists(){

        return (new SearchByArtists())->search();

    }



}

