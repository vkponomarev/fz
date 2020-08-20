<?php

namespace common\components\songs;

use Yii;


class SongsByTranslations
{

    public function songs($count, $languageID)
    {

        $random = rand(0,2187200);
        //(new \common\components\dump\Dump())->printR($random);
        $songs = Yii::$app->db
            ->createCommand('
            select
            m_songs.id,
            m_songs.name,
            m_songs.url,
            m_songs.url_youtube,   
            m_songs.m_artists_id,
            m_artists.url as artistUrl,
            m_artists.name as artistName,
            m_songs_translations.text as translationText
            from
            m_songs
            left join m_artists on m_artists.id = m_songs.m_artists_id
            left join m_songs_translations on m_songs_translations.m_songs_id = m_songs.id and m_songs_translations.languages_id = :languageID
            where
            m_songs.id > :random
            order by 
            m_songs.id
            limit :count
            ', [':random' => $random, ':count' => $count, ':languageID' => $languageID])
            ->queryAll();

        return $songs;
    }

}

