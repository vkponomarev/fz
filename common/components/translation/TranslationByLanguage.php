<?php

namespace common\components\translation;

use Yii;

class TranslationByLanguage
{

    public function translation($songID, $languageID)
    {

        $translation = Yii::$app->db
            ->createCommand('
            select
            m_songs_translations.id,
            m_songs_translations.m_songs_id,
            m_songs_translations.languages_id,
            m_songs_translations.origin,
            m_songs_translations.text
            from
            m_songs_translations
            where
            m_songs_translations.m_songs_id = :songID
            and 
            m_songs_translations.languages_id = :languageID
            ', [':songID' => $songID, ':languageID' => $languageID])
            ->queryOne();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $translation;
    }

}

