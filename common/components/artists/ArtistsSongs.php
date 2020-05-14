<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsSongs
{

    public function artistsSongs($id)
    {

        $artistsSongs = Yii::$app->db
            ->createCommand('
            select
            m_songs.id,
            m_songs.name,
            m_songs.url,
            m_songs.m_albums_id
            from
            m_songs
            where
            m_songs.m_artists_id = :id
            ', [':id' => $id])
            ->queryAll();
        //echo $id;
        (new \common\components\dump\Dump())->printR($artistsSongs);


        return $artistsSongs;
    }


}

