<?php

namespace common\components\main;



use Yii;

class MainLanguage
{


    function language(){

        $languages = Yii::$app->db
            ->createCommand('
            select
            languages.id,
            languages.name,
            languages.url,
            languages.active
            from
            languages
            where languages.active = 1'
            )
            ->queryAll();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($languageId);
        //echo '</pre>';

        $key = array_search(Yii::$app->language, array_column($languages, 'url'));

        return [
            'all' => $languages,
            'current' => $languages[$key],
            'id' => $languages[$key]['id'],
        ];
    }













    public function currentLanguage(){

        $currentLanguage = Yii::$app->db
            ->createCommand('
            select
            languages.id,
            languages.name,
            languages.url,
            languages.active
            from
            languages
            where languages.url = "' . Yii::$app->language . '"'
            )
            ->queryOne();



        //echo '<pre>';
        //var_dump($texts);
        //print_r($languageId);
        //echo '</pre>';

        return [


        ];

    }


    public function LanguageSelection(){

        $currentLanguage = Yii::$app->db
            ->createCommand('
            select
            languages.name,
            languages.url
            from
            languages
            where languages.active = 1'
            )
            ->queryAll();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($languageId);
        //echo '</pre>';

        return $currentLanguage;

    }





}

