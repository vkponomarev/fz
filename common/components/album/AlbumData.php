<?php

namespace common\components\album;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumData
{

    public function data($id)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.m_artists_id,
            m_albums.first_letter,
            m_albums.photos,
            m_albums.name,
            m_albums.url,
            m_albums.year,
            m_years.url as mYearUrl
            from
            m_albums
            left join m_years on m_years.id = m_albums.m_years_id
            where 
            m_albums.id = :id
            ', [':id' => $id])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($albumData);

        return $data;
    }

}

