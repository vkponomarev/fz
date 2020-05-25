<?php

namespace common\components\cms;

use Yii;
use yii\web\NotFoundHttpException;

class CmsPolicy
{

    public function albums($id)
    {

        $albums = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_albums
            where
            m_albums.m_artists_id = :id
            and 
            m_albums.active = 1
            order by
            year
            ', [':id' => $id])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $albums;
    }




}

