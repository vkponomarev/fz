<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsByAll
{

    public function artists()
    {

        $artists = Yii::$app->db
            ->createCommand('
            select
            m_artists.id,
            m_artists.genres
            from
            m_artists
            ORDER BY 
            m_artists.id
            ')
            ->queryAll();

        return $artists;
    }

}

