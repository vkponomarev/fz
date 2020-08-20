<?php

namespace common\components\songs;

use Yii;
use yii\web\NotFoundHttpException;

class SongsByListenMusicMainPage
{

    public function songs()
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
            m_artists.name as artistName
            from
            m_songs
            left join m_artists on m_artists.id = m_songs.m_artists_id
            where
            m_songs.url_youtube is not null
            and 
            m_songs.id > :random
            order by 
            m_songs.id
            limit 20
            ', [':random' => $random])
            ->queryAll();

        return $songs;

    }

}

