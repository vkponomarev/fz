<?php

namespace common\components\gii\view;


class ViewGenerateFileArray
{


    /**
     * 1. Создаем конкретный файл
     */

    function generate($array, $fileName, $filePath)
    {


        $data = json_encode($array);  // JSON формат сохраняемого значения.
        $f = fopen($filePath . $fileName, 'w');
        fwrite($f, $data);
        fclose($f);


    }


}
