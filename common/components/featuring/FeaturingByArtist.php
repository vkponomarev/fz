<?php

namespace common\components\featuring;

use Yii;
use yii\web\NotFoundHttpException;

class FeaturingByArtist
{

    public function featuring($artistID)
    {

        $featuring = Yii::$app->db
            ->createCommand('
            select
            m_featuring.m_songs_id as songID,
            m_artists.name,
            m_artists.url
            from
            m_featuring
            left join m_artists on m_artists.id = m_featuring.m_artists_id_feature
            where
            m_featuring.m_artists_id = :id
            ', [':id' => $artistID])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $featuring;

    }

}

