<?php

namespace common\components\songs;

use Yii;


class SongsByPopularity
{

    public function songs($count)
    {

        $random = rand(0,2187200);
        $songs = Yii::$app->db
            ->createCommand('
            select
            m_songs.name,
            m_songs.url,
            m_songs.year,
            m_songs.m_albums_id,
            m_artists.name as artistName,
            m_artists.url as artistUrl,
            m_albums.photos as albumPhoto,
            m_albums.first_letter as albumFirstLetter
            from
            m_songs
            left join m_albums on m_albums.id = m_songs.m_albums_id
            left join m_artists on m_artists.id = m_songs.m_artists_id
            where 
            m_songs.id > :random
            limit
            :countSongs  
            ', [':random' => $random, ':countSongs' => $count])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

}
/*
 *         $songs = Yii::$app->db
            ->createCommand('
            select
            m_songs.name,
            m_songs.url,
            m_songs.year,
            m_songs.m_albums_id,
            m_artists.name as artistName,
            m_artists.url as artistUrl,
            m_albums.photos as albumPhoto,
            m_albums.first_letter as albumFirstLetter
            from
            m_songs
            join m_albums on m_albums.id = m_songs.m_albums_id
            join m_artists on m_artists.id = m_songs.m_artists_id
            where
            m_songs.id > :random
            limit
            :countSongs
            ', [':random' => $random, ':countSongs' => $count])
            ->queryAll();
 *
 * */
