<?php

namespace common\components\gii\createViewPartials;


class CreateRawDataSave
{


    function __construct()
    {

    }


    function save($fileRaw, $filePath, $fileName)
    {

        if (!is_dir($filePath)) {

            mkdir($filePath, 0755, true);

        }

        $fp = fopen($filePath . $fileName, "w");
        // записываем в файл текст
        fwrite($fp, $fileRaw);
        // закрываем
        fclose($fp);

    }


}
