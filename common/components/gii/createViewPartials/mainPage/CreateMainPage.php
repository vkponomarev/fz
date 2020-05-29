<?php

namespace common\components\gii\createViewPartials\alternate;


class CreateMainPage
{



    function __construct($partialsConfig)
    {

        $this->realPath = $this->realPath($partialsConfig);
        $this->clean($this->realPath);
        $this->create($this->realPath, $partialsConfig);

    }

    function realPath($partialsConfig)
    {

        return realpath($_SERVER['DOCUMENT_ROOT'] . '/../../') . "/frontend/views/" . $partialsConfig['path'];

    }

    function clean($path)
    {
        //(new \common\components\dump\Dump())->printR($path);
        // если путь существует и это папка
        if (file_exists($path) AND is_dir($path)) {
            // открываем папку
            //(new \common\components\dump\Dump())->printR($path);
            $dir = opendir($path);
            while (false !== ($element = readdir($dir))) {
                // удаляем только содержимое папки
                if ($element != '.' AND $element != '..') {
                    $tmp = $path . '/' . $element;
                    chmod($tmp, 0777);
                    // если элемент является папкой, то
                    // удаляем его используя нашу функцию RDir
                    if (is_dir($tmp)) {
                        $this->clean($tmp);
                        // если элемент является файлом, то удаляем файл
                    } else {
                        unlink($tmp);
                    }
                }
            }
            // закрываем папку
            closedir($dir);
            // удаляем саму папку
            if (file_exists($path)) {
                rmdir($path);
            }
        }

    }


    function create($path, $partialsConfig)
    {

        //(new \common\components\dump\Dump())->printR($path);
        //Создаем папку
        if (!is_dir($path)) {

             mkdir($path, 0755, true);

        }

        //Создаем файлы вида
        // Для этого нам нужо сделать перебор
        //создаем language-selection.php

        $template = (new AlternateTemplate())->template($path, $partialsConfig);


    }

}
