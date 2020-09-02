<?php

namespace common\components\genres;

use Yii;
use yii\web\NotFoundHttpException;

class GenresByParent
{

    public function genres($genreID)
    {

        $genres = Yii::$app->db
            ->createCommand('
            select
            m_genres.name,
            m_genres.url
            from
            m_genres_parent
            left join m_genres on m_genres.id = m_genres_parent.m_genres_parent_id
            where
            m_genres_parent.m_genres_id = :genreID
            ', [':genreID' => $genreID])
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($genreID);

        return $genres;

    }

}

