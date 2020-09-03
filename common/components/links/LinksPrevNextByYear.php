<?php

namespace common\components\links;

use Yii;
use yii\data\SqlDataProvider;

class LinksPrevNextByYear

{

    function links($url, $pageSize, $letterLinkPrevNext){

        Yii::$app->params['prevNext'] = [

            'url' => 'years/' . $url,
            'urlOne' => 'years',
            'urlTwo' => $url,
            'pageSize' => $pageSize,
            'prev' => $letterLinkPrevNext['prev'],
            'next' => $letterLinkPrevNext['next'],

        ];

    }

}