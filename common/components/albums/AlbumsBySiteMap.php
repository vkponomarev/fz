<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsBySiteMap
{

    public function albums()
    {

        $albums = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.url
            from
            m_albums
            ')
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($albums);

        return $albums;
    }

}

