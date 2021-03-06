<?php

namespace common\components\artist;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistData
{

    public function data($id)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            first_letter,
            photos
            from
            m_artists
            where 
            m_artists.id = :id
            ', [':id' => $id])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($data, 'artistData');

        return $data;
    }

/**
select
m_artists.name,
m_artists.photos,
m_artists.first_letter,
m_artists_first_letters.first_letter,
m_artists_first_letters.url
from
m_artists
left join m_artists_first_letters on m_artists_first_letters.id = m_artists.first_letter
where
m_artists.id = 30585
 */

}

