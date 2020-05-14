<?php

namespace common\components\artist;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistSongs
{

    public function artistSongs($id)
    {

        $artistSongs = Yii::$app->db
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
        (new \common\components\dump\Dump())->printR($artistSongs);


        return $artistSongs;
    }


}

