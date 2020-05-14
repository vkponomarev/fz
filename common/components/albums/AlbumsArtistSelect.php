<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsArtistSelect
{

    public function albumsArtistSelect($id)
    {

        $albumsArtistSelect = Yii::$app->db
            ->createCommand('
            select
            m_albums.name,
            m_albums.url,
            m_albums.year
            from
            m_albums
            where
            m_albums.m_artists_id = :id
            ', [':id' => $id])
            ->queryAll();
        echo $id;
        echo '<pre>';
        //var_dump($texts);
        print_r($albumsArtistSelect);
        echo '</pre>';

        return $albumsArtistSelect;
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

