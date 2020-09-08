<?php

namespace common\components\mLanguage;

use common\models\Languages;
use Yii;
use yii\web\NotFoundHttpException;

class MLanguageBySong
{

    public function data($languageID, $mLanguageID)
    {

        //$data = Languages::find()->where(['active' => 1])->all();
        $data = Yii::$app->db
            ->createCommand('
            select
            m_languages.id,
            m_languages.url,
            m_languages_text.name,
            m_languages.main
            from
            m_languages
            join m_languages_text on m_languages_text.m_languages_id = m_languages.id
            where
            m_languages.id = :mLanguageID
            and 
            m_languages_text.languages_id = :languageID
            ',[':languageID' => $languageID, ':mLanguageID' => $mLanguageID])
            ->queryOne();

        return $data;

    }
}

