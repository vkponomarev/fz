<?php

namespace common\components\gii\siteMap;


class SiteMapGenerateFile
{


    /**
     * 1. Создаем конкретный файл
     */

    function generate($siteMapContent, $fileName, $filePath)
    {

        //(new \common\components\dump\Dump())->printR($filePath);


        if (!is_dir($filePath)) {

            mkdir($filePath, 0755, true);

        }

        $fp = fopen($filePath . $fileName, "w");
        // записываем в файл текст
        fwrite($fp, $siteMapContent);
        // закрываем
        fclose($fp);

    }


}
