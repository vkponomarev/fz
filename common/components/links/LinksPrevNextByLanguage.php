<?php

namespace common\components\links;

use Yii;
use yii\data\SqlDataProvider;

class LinksPrevNextByLanguage

{

    function links($url, $pageSize, $letterLinkPrevNext){

        Yii::$app->params['prevNext'] = [

            'url' => 'languages/' . $url,
            'urlOne' => 'languages',
            'urlTwo' => $url,
            'pageSize' => $pageSize,
            'prev' => $letterLinkPrevNext['prev'],
            'next' => $letterLinkPrevNext['next'],

        ];

    }

}