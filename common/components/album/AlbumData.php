<?php

namespace common\components\album;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumData
{

    public function data($id)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            id,
            m_artists_id,
            first_letter,
            photos,
            name,
            url,
            year
            from
            m_albums
            where 
            m_albums.id = :id
            ', [':id' => $id])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($albumData);

        return $data;
    }

}

