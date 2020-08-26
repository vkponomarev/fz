<?php

namespace common\components\main;


use Yii;

class MainLanguage
{


    function language($languageUrl)
    {

        $language = Yii::$app->db
            ->createCommand('
            select
            languages.id,
            languages.name,
            languages.url,
            languages.active
            from
            languages
            where languages.url = :languageUrl'
            , [':languageUrl' => $languageUrl])
            ->queryOne();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($languageId);
        //echo '</pre>';

        return [
            'current' => $language,
            'id' => $language['id'],
        ];
    }

    function languages()
    {
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

        return $languages;
    }


}

