<?php

namespace common\components\albums;

use Yii;


class AlbumsByStartEnd
{

    public function albums($start, $end)
    {

        $albums = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.m_artists_id,
            m_albums.m_genres_id
            from
            m_albums
            where 
            m_albums.id > :start
            and 
            m_albums.id <= :end
            ', [':start' => $start, ':end' => $end])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $albums;
    }

}

