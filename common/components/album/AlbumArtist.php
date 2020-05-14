<?php

namespace common\components\album;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumArtist
{

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

