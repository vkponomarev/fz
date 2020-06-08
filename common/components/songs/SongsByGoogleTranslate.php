<?php

namespace common\components\songs;

use Yii;


class SongsByGoogleTranslate
{

    public function songs($start, $end)
    {

        $songs = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_songs
            where 
            id > :start
            and 
            id <= :end
            ', [':start' => $start, ':end' => $end])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

}

