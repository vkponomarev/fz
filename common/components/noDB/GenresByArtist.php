<?php

namespace common\components\genres;

use Yii;
use yii\web\NotFoundHttpException;

class GenresByArtist
{

    public function genres($artistID)
    {

        $genres = Yii::$app->db
            ->createCommand('
            select
            m_genres.name,
            m_genres.url
            from
            m_artists_genres
            left join m_genres on m_genres.id = m_artists_genres.m_genres_id
            where
            m_artists_genres.m_artists_id = :id
            ', [':id' => $artistID])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $genres;

    }

}

