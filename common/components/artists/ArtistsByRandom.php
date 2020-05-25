<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsByRandom
{

    public function artists($count)
    {
        $random = rand(0,84000);
        $artists = Yii::$app->db
            ->createCommand('
            select
            m_artists.id,
            m_artists.name,
            m_artists.photos,
            m_artists.first_letter,
            m_artists.url
            from
            m_artists
            where 
            m_artists.id > :id
            and
            m_artists.active = 1
            limit
            :countArtist          
            ', [':id' => $random, ':countArtist' => $count])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($artists, 'ArtistsByRandom');

        return $artists;
    }

}

