<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsByArtist
{

    public function albums($id)
    {

        $albums = Yii::$app->db
            ->createCommand('
            select
            *
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

        return $albums;
    }




}

