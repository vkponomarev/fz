<?php

namespace common\components\artists;

use Yii;


class ArtistsByStartEnd
{

    public function artists($start, $end)
    {

        $artists = Yii::$app->db
            ->createCommand('
            select
            m_artists.id,
            m_artists.name,
            m_artists.url
            from
            m_artists
            where 
            m_artists.id > :start
            and 
            m_artists.id <= :end
            ', [':start' => $start, ':end' => $end])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $artists;
    }

}

