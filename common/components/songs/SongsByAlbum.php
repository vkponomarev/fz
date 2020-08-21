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
            id,
            name,
            url,
            url_youtube
            from
            m_songs
            where 
            m_songs.m_albums_id = :id
            ', [':id' => $id])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

}

