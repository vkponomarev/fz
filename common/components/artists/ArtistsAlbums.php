<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsAlbums
{

    public function artistsAlbums($id)
    {

        $artistsAlbums = Yii::$app->db
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
        echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $artistsAlbums;
    }


}

