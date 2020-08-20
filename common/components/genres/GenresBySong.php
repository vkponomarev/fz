<?php

namespace common\components\genres;

use Yii;
use yii\web\NotFoundHttpException;

class GenresBySong
{

    public function genres($songID)
    {

        $genres = Yii::$app->db
            ->createCommand('
            select
            m_genres.name,
            m_genres.url
            from
            m_songs_genres
            left join m_genres on m_genres.id = m_songs_genres.m_genres_id
            where
            m_songs_genres.m_songs_id = :id
            ', [':id' => $songID])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $genres;

    }

}

