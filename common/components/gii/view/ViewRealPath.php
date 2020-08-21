<?php

namespace common\components\gii\view;


use Yii;

class ViewRealPath
{

    function realPath()
    {

        return realpath($_SERVER['DOCUMENT_ROOT'] . '/../../') . "/frontend/views/gii";

    }

}
