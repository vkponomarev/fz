<?php

namespace common\components\main;



use Yii;

class MainText
{

    public function text($textID, $languageID)
    {
        //echo $languageId;
        $text = Yii::$app->db
            ->createCommand('
            select
            pages_text.title,
            pages_text.h1,
            pages_text.description,
            pages_text.text1,
            pages_text.text2
            from
            pages_text
            join pages on pages_text.pages_id = pages.id
            where pages.id = :textID and pages_text.languages_id = :languageID
            ',[':textID' => $textID, ':languageID' => $languageID])
            ->queryOne();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($pageText);
        //echo '</pre>';

        return $text;
    }


}

