<?php

namespace common\components\genres;

use Yii;
use yii\web\NotFoundHttpException;

class GenresDataByMain
{

    public function genres()
    {

        $genres = Yii::$app->db
            ->createCommand('
            select
            m_genres.name,
            m_genres.url
            from
            m_genres
            where
            m_genres.parent_id = 1
            ')
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $genres;

    }

}

