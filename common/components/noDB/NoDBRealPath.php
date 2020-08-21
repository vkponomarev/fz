<?php

namespace common\components\noDB;


use Yii;

class NoDBRealPath
{

    function realPath()
    {

        return realpath($_SERVER['DOCUMENT_ROOT'] . '/../../') . "/frontend/views/gii";

    }

}
