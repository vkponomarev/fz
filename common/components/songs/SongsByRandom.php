<?php

namespace common\components\songs;

use Yii;


class SongsByRandom
{

    public function songs()
    {

        $random = rand(0,2187200);
        $songs = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_songs
            where 
            id > :id
            limit
            10  
            ', [':id' => $random])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($songs);

        return $songs;
    }

}

