<?php

namespace common\components\mLanguages;

use common\models\Languages;
use Yii;
use yii\web\NotFoundHttpException;

class MLanguagesData
{

    public function data($languageID)
    {

        //$data = Languages::find()->where(['active' => 1])->all();
        $data = Yii::$app->db
            ->createCommand('
            select
            m_languages.id,
            m_languages.url,
            m_languages_text.name
            from
            m_languages
            join m_languages_text on m_languages_text.m_languages_id = m_languages.id
            where
            m_languages.main = 1
            and 
            m_languages_text.languages_id = :languageID
            ',[':languageID' => $languageID])
            ->queryAll();

        return $data;

    }
    /*
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
->queryOne();*/
}

