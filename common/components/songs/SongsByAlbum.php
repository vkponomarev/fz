<?php

namespace common\components\songs;

use Yii;
use yii\web\NotFoundHttpException;

class SongsByAlbum
{

    public function songs($id)
    {

        $songs = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_songs
            where 
            m_songs.m_albums_id = :id
            ', [':id' => $id])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

/**
select
m_artists.name,
m_artists.photos,
m_artists.first_letter,
m_artists_first_letters.first_letter,
m_artists_first_letters.url
from
m_artists
left join m_artists_first_letters on m_artists_first_letters.id = m_artists.first_letter
where
m_artists.id = 30585
 */

}

