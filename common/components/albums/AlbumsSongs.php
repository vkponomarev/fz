<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsSongs
{

    public function albumsSongs($id)
    {

        $albumsSongs = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.name,
            m_albums.url,
            m_albums.first_letter,
            m_albums.photos
            from
            m_sogns
            where
            m_albums.m_artists_id = :id
            order by
            year
            ', [':id' => $id])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $albumsSongs;
    }

    public function albumSongs($id)
    {

        $albumSongs = Yii::$app->db
            ->createCommand('
            select
            m_songs.id,
            m_songs.m_albums_id,
            m_songs.name,
            m_songs.url            
            from
            m_songs
            where
            m_songs.m_albums_id = :id
            ', [':id' => $id])
            ->queryAll();
        //echo $id;
        (new \common\components\dump\Dump())->printR($albumSongs);

        return $albumSongs;
    }


}

