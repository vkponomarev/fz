<?php

namespace common\components\featuring;

use Yii;
use yii\web\NotFoundHttpException;

class FeaturingBySong
{

    public function featuring($songID)
    {

        $featuring = Yii::$app->db
            ->createCommand('
            select
            m_artists.name,
            m_artists.url
            from
            m_featuring
            left join m_artists on m_artists.id = m_featuring.m_artists_id_feature
            where
            m_featuring.m_songs_id = :id
            ', [':id' => $songID])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $featuring;

    }

}

