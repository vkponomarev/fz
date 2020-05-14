<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsGetArtist
{

    public function artistsGetArtist($id)
    {

        $artistsGetArtist = Yii::$app->db
            ->createCommand('
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
            m_artists.id = :id
            ', [':id' => $id])
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($artistsGetArtist);
        echo '</pre>';

        return $artistsGetArtist;
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

