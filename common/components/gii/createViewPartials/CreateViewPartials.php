<?php

namespace common\components\gii\createViewPartials;


class CreateViewPartials
{


    /**
     * Создание калькулятора для бекэнда:
     * 1. Создание файлов вида каждой страницы сайта, которые загружают систему например лезут в базу, много циклов внутри кода,
     * Каждый раз при нажатии на создать определенные файлы вида (выбор) мы удаляем предыдущие созданные и создаем новые
     * файлы
     *
     * Пример: код выбора текущего языка сайта, меню, внутренние категории, крошки.
     * При запуске любой страницы данные создаются заного проходятся циклы и делается запрос в базу.
     *
     * Делаем физические готовые файлы конткретного кода который не должен каждый раз строиться заного, потому что информация
     * не меняется а сервер грузить все это заного.
     *
     * Выбор части сайта
     *
     * 1. Удаление созданнйо конкретной части сайта.
     * 2. Создание конкретной части сайта.
     * 3.
     */


    var $partialsConfig; //Настройки для каждой отдельной части сайта
    //                'name' => 'Выбор текущего языка',
    //                'path' => 'partials/view/language-selection/',
    //                'getParam' => 'language-selection',




    function __construct($partialGetParam)
    {

        $this->partialsConfig = $this->getPartialConfig($partialGetParam);

        $this->start($this->partialsConfig);

        //(new \common\components\dump\Dump())->printR($this->partialsData);



    }


    function getPartialConfig($partialGetParam){

        $partialsData = (new CreateViewPartialsConfig())->createViewPartialsConfig();
        //(new \common\components\dump\Dump())->printR($partialsData);
        $key = array_search($partialGetParam, array_column($partialsData, 'getParam'),true);
        //(new \common\components\dump\Dump())->printR($key);
        return $partialsData[$key];

    }

    function start($partialsConfig){

        //(new \common\components\dump\Dump())->printR();
        //CreateViewPartialsLanguageSelection
       // CreateViewPartialsLanguageSelection

        (new $partialsConfig['className']($partialsConfig));



    }


}
