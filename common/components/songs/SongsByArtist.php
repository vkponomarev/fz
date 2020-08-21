<?php

namespace common\components\songs;

use Yii;
use yii\web\NotFoundHttpException;

class SongsByArtist
{

    public function songs($id)
    {

        $songs = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url,
            m_albums_id,
            url_youtube
            from
            m_songs
            where 
            m_songs.m_artists_id = :id
            ', [':id' => $id])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

}

