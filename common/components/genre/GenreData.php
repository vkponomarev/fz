<?php

namespace common\components\genre;

use Yii;
use yii\web\NotFoundHttpException;

class GenreData
{

    public function genre($genreID)
    {

        $genre = Yii::$app->db
            ->createCommand('
            select
            m_genres.id,
            m_genres.name,
            m_genres.url
            from
            m_genres
            where
            m_genres.id = :genreID
            ', [':genreID' => $genreID])
            ->queryOne();

        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $genre;

    }

}

