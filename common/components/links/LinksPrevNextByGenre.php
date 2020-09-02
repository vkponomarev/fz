<?php

namespace common\components\links;

use Yii;
use yii\data\SqlDataProvider;

class LinksPrevNextByGenre

{

    function links($url, $pageSize, $letterLinkPrevNext){

        Yii::$app->params['prevNext'] = [

            'url' => 'genres/' . $url,
            'urlOne' => 'genres',
            'urlTwo' => $url,
            'pageSize' => $pageSize,
            'prev' => $letterLinkPrevNext['prev'],
            'next' => $letterLinkPrevNext['next'],

        ];

    }

}