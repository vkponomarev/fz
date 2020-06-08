<?php

namespace common\components\translations;

use Yii;
use yii\web\NotFoundHttpException;

class TranslationsByLanguages
{

    public function translations($songID)
    {

        $translations = Yii::$app->db
            ->createCommand('
            select
            m_songs_translations.id,
            m_songs_translations.m_songs_id,
            m_songs_translations.languages_id,
            m_songs_translations.origin,
            languages.id as languagesID,
            languages.name,
            languages.url
            from
            m_songs_translations
            join languages on languages.id = m_songs_translations.languages_id
            where
            m_songs_id = :id
            ', [':id' => $songID])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $translations;

    }

}

