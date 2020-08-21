<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;




class UrlCheckCheck
{

    function check($url, $trueUrl){

        if ($url <> $trueUrl){

            throw new NotFoundHttpException('404');

        }

        return true;

    }


}
