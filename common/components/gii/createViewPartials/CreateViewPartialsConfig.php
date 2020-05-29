<?php

namespace common\components\gii\CreateViewPartials;


class CreateViewPartialsConfig
{

    /**
     *
     * Здесь храняться названия и параметры частей сайта
     *
     */


    function createViewPartialsConfig()
    {

        $createViewPartialsNames = [

            0 => [

                'name' => 'Выбор текущего языка',
                'path' => 'partials/view/language-selection',
                'getParam' => 'language-selection',
                'className' => 'common\components\gii\createViewPartials\languageSelection\LanguageSelection',

            ],


            1 => [

                'name' => 'Основное меню сайта',
                'path' => 'partials/view/menu',
                'getParam' => 'menu',
                'className' => 'common\components\gii\createViewPartials\menu\Menu',

            ],


            2 => [

                'name' => 'link rel=alternate',
                'path' => 'partials/view/alternate',
                'getParam' => 'alternate',
                'className' => 'common\components\gii\createViewPartials\alternate\Alternate',

            ],

            3 => [

                'name' => 'Крошки',
                'path' => 'partials/view/breadcrumbs',
                'getParam' => 'breadcrumbs',
                'className' => 'common\components\gii\createViewPartials\breadcrumbs\Breadcrumbs',

            ],

            4 => [

                'name' => 'Внутренние категории',
                'path' => 'partials/view/parent-categories',
                'getParam' => 'parent-categories',
                'className' => 'common\components\gii\createViewPartials\parentCategories\ParentCategories',

            ],

        ];

        return $createViewPartialsNames;

    }

}
