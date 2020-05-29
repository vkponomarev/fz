<?php

namespace common\components\gii\createViewPartials;


class CreateRawDataPath
{


    function __construct()
    {

    }


    function path($path)
    {

        return realpath($_SERVER['DOCUMENT_ROOT'] . '/../../') . "/frontend/views/" . $path;

    }
}
