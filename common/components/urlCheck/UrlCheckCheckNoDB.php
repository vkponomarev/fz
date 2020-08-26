<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;




class UrlCheckCheckNoDB
{

    function check($realPath, $path, $file){


        if (!file_exists($realPath . $path . $file)){

            throw new NotFoundHttpException('404');

        }

        return true;

    }


}
