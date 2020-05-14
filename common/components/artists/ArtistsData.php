<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsData
{

    public function artistsData($id)
    {

        $artistsData = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_artists
            //left join m_artists_first_letters on m_artists_first_letters.id = m_artists.first_letter 
            where 
            m_artists.id = :id
            ', [':id' => $id])
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($artistsData);
        echo '</pre>';

        return $artistsData;
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

