<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsBySiteMap
{

    public function artists()
    {

        $artists = Yii::$app->db
            ->createCommand('
            select
            m_artists.id,
            m_artists.url
            from
            m_artists
            ORDER BY 
            m_artists.id
            ')
            ->queryAll();

        return $artists;
    }

}

