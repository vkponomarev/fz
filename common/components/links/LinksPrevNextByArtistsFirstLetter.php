<?php

namespace common\components\links;

use Yii;
use yii\data\SqlDataProvider;

class LinksPrevNextByArtistsFirstLetter

{

    function links($url, $pageSize, $letterLinkPrevNext){

        Yii::$app->params['prevNext'] = [

            'url' => 'artists/index/' . $url,
            'urlOne' => 'artists/index',
            'urlTwo' => $url,
            'pageSize' => $pageSize,
            'prev' => $letterLinkPrevNext['prev'],
            'next' => $letterLinkPrevNext['next'],

        ];

    }

}