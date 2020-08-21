<?php

namespace common\components\songs;

use Yii;
use yii\web\NotFoundHttpException;

class SongsByArtistLimit
{

    public function songs($id)
    {

        $songs = Yii::$app->db
            ->createCommand('
            select
            name,
            url,
            url_youtube
            from
            m_songs
            where 
            m_songs.m_artists_id = :id
            limit
            12
            ', [':id' => $id])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

}

