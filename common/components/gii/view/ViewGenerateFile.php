<?php

namespace common\components\gii\view;


class ViewGenerateFile
{


    /**
     * 1. Создаем конкретный файл
     */

    function generate($content, $fileName, $filePath)
    {


        (new \common\components\dump\Dump())->printR($filePath);
        if (!is_dir($filePath)) {

            mkdir($filePath, 0755, true);

        }

        $fp = fopen($filePath . $fileName, "w");
        // записываем в файл текст
        fwrite($fp, $content);
        // закрываем
        fclose($fp);

    }

}
