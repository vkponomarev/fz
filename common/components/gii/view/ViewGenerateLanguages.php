<?php

namespace common\components\gii\view;


use common\components\main\Main;
use Yii;

class ViewGenerateLanguages
{


    function generate($languagesData)
    {
        set_time_limit(500000);

        foreach ($languagesData as $language) {

            Yii::$app->language = $language['url'];
            $main = new Main();
            Yii::$app->params['language'] = $main->language(Yii::$app->language);
            Yii::$app->params['language']['all'] = $main->languages();

            $view = new View();
            $filePath = $view->realPath() . '/view/languages/';

            $arrayName = $language['url'] . '-array.php';
            $array = [
                'language' => Yii::$app->params['language'],
            ];

            $view->generateFileArray($array, $arrayName, $filePath);

        }
/*
        Yii::$app->params['languages'] = $main->languages();
        $arrayName = 'all-array.php';
        $array = [
            'languages' => Yii::$app->params['languages'],
        ];
        $view->generateFileArray($array, $arrayName, $filePath);
*/

    }

}
