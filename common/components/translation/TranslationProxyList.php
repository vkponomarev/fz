<?php

namespace common\components\translation;

use Yii;
use yii\web\NotFoundHttpException;

class TranslationProxyList
{

    public function proxy()
    {

        $proxyList = [
            'http://51.91.212.159:3128',
            'http://45.76.236.83:3128',
            'http://38.91.100.122:3128',
            'http://45.63.51.251:8080',
            'http://35.233.136.146:3128',
        ];

        $proxy = array_rand($proxyList, 1);
        //(new \common\components\dump\Dump())->printR($proxyList[$proxy]);
        return $proxyList[$proxy];

    }

}

