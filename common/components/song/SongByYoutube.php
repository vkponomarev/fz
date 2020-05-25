<?php

namespace common\components\song;

use Yii;
use yii\web\NotFoundHttpException;

class SongByYoutube
{

    public function song()
    {
        $random = rand(0,2187200);
        //(new \common\components\dump\Dump())->printR($random);
        $song = Yii::$app->db
            ->createCommand('
            select
            m_songs.name,
            m_songs.url,
            m_songs.url_youtube,   
            m_songs.m_artists_id,
            m_artists.url as artistUrl,
            m_artists.name as artistName
            from
            m_songs
            left join m_artists on m_artists.id = m_songs.m_artists_id
            where
            m_songs.url_youtube is not null
            and 
            m_songs.id > :random
            limit 1
            ', [':random' => $random])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($song);
        $song['youtubeUrl'] = explode('=', $song['url_youtube']);
        //(new \common\components\dump\Dump())->printR($song);

        if ($song['youtubeUrl']){

            return $song;

        } else {

            return $song;

        }

    }

}


/*
 *     public function song()
    {
        $random = rand(0,2187200);
        (new \common\components\dump\Dump())->printR($random);
        $song = Yii::$app->db
            ->createCommand('
            select
            m_songs.name,
            m_songs.url,
            m_songs.url_youtube,
            m_songs.m_artists_id,
            m_artists.url as artistUrl,
            m_artists.name as artistName
            from
            m_songs
            right join m_artists on m_artists.id = m_songs.m_artists_id
            where
            m_songs.url_youtube is not null
            and
            m_songs.id > :random
            ', [':random' => $random])
            ->queryOne();
        (new \common\components\dump\Dump())->printR($song);
        $song = explode('=', $song['url_youtube']);
        (new \common\components\dump\Dump())->printR($song);

        if (isset($song['1'])){

            return $song['1'];

        } else {

            return 0;

        }



    }
 *
 * */
