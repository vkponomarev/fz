<?php

namespace common\components\song;

use Yii;
use yii\web\NotFoundHttpException;

class SongData
{

    public function data($id)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url,
            text,
            url_youtube,
            m_albums_id,
            m_artists_id
            from
            m_songs
            where 
            id = :id
            ', [':id' => $id])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($data);

        return $data;
    }

}

