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
            m_albums.id,
            m_albums.url,
            m_albums.name,
            m_albums.photos,
            m_albums.first_letter,
            m_albums.m_years_id,
            m_albums.year,
            m_years.url as mYearUrl           
            from
            m_albums
            left join m_years on m_years.id = m_albums.m_years_id
            where
            m_albums.m_artists_id = :id
            and 
            m_albums.active = 1
            order by
            year
            ', [':id' => $id])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $albums;
    }




}

