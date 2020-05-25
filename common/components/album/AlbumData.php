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
            *
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

