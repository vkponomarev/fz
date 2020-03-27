<?php

namespace common\components\mainPagesData;



use Yii;

class MainPagesDataPageText
{

    public function pageText($currentPageId, $currentLanguageId)
    {
        //echo $languageId;
        $pageText = Yii::$app->db
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
            where pages.id = "' . $currentPageId . '" and pages_text.languages_id = "' . $currentLanguageId . '"
            ')
            ->queryOne();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($pageText);
        //echo '</pre>';

        return $pageText;
    }


}

