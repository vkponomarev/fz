<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsByPopularity
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
            m_albums.url,
            m_albums.year,
            m_artists.name as artistName,
            m_artists.url as artistUrl
            from
            m_albums
            join m_artists on m_artists.id = m_albums.m_artists_id
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

