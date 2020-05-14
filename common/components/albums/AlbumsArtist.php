<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsArtist
{

    public function albumsArtist($id)
    {

        $albumsArtist = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.name,
            m_albums.url,
            m_albums.first_letter,
            m_albums.photos
            from
            m_albums
            where
            m_albums.m_artists_id = :id
            order by
            year
            ', [':id' => $id])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $albumsArtist;
    }

    public function albumArtist($id)
    {

        $albumArtist = Yii::$app->db
            ->createCommand('
            select
            m_artist.id,
            m_artist.name,
            m_artist.url,
            m_artist.first_letter,
            m_artist.photos
            from
            m_artist
            where
            m_artist.m_artists_id = :id
            order by
            year
            ', [':id' => $id])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $albumArtist;
    }


}

