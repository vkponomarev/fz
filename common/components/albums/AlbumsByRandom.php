<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsByRandom
{

    public function albums($count)
    {
        $random = rand(0,170401);
        $albums = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.name,
            m_albums.photos,
            m_albums.first_letter,
            m_albums.url
            from
            m_albums
            where 
            m_albums.id > :id
            and 
            m_albums.active = 1
            limit
            :countAlbums            
            ', [':id' => $random, ':countAlbums' => $count])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($albums);

        return $albums;
    }

}

