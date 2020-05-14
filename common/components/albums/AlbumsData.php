<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsData
{

    public function albumData($id)
    {

        $albumData = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.name,
            m_albums.photos,
            m_albums.first_letter,
            m_albums.url,
            m_artists.id as artists_id,
            m_artists.name  as artists_name,
            m_artists.url  as artists_url
            from
            m_albums
            left join m_artists on m_artists.id = m_albums.m_artists_id 
            where 
            m_albums.id = :id
            ', [':id' => $id])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($albumData);

        return $albumData;
    }

}

