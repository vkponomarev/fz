<?php

namespace common\components\songs;

use Yii;


class SongsByStartEnd
{

    public function songs($start, $end)
    {

        $songs = Yii::$app->db
            ->createCommand('
            select
            m_songs.id,
            m_songs.m_genres_id,
            m_songs.m_artists_id,
            m_songs.m_albums_id
            from
            m_songs
            where 
            m_songs.id > :start
            and 
            m_songs.id <= :end
            ', [':start' => $start, ':end' => $end])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

}

