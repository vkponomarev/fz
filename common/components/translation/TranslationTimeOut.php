<?php

namespace common\components\translation;

use Yii;
use yii\web\NotFoundHttpException;

class TranslationTimeOut
{

    public function timeOut()
    {

        $timeOutList = [
            '100',
            '200',
            '300',
            '400',
            '500',
            '600',
            '700',
            '800',
            '900',
            '1000',
            '1100',
            '1200',
            '1300',

        ];


        $timeOut = array_rand($timeOutList, 1);
        return $timeOutList[$timeOut];

    }

}

