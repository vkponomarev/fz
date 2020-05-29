<?php

namespace common\components\gii\createViewPartials;


class CreateRawData
{




    function __construct()
    {

    }


    function create($data, $name){

        return (new CreateRawDataVariable())->variable($data, $name);

    }

    function startFile(){

        return (new CreateRawDataStartFile())->startFile();

    }
    function endFile(){

        return (new CreateRawDataEndFile())->endFile();

    }

    function save($fileRaw, $filePath, $fileName){

        (new CreateRawDataSave())->save($fileRaw, $filePath, $fileName);

    }

    function path($path){

        return (new CreateRawDataPath())->path($path);

    }


}
