<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsListRandom
{

    public function albumsListRandom()
    {
        $random = rand(0,170401);
        $albumsListRandom = Yii::$app->db
            ->createCommand('
            select
            m_albums.id,
            m_albums.name,
            m_albums.photos,
            m_albums.first_letter,
            m_albums.url
            from
            m_albums
            where 
            m_albums.id > :id
            limit
            10            
            ', [':id' => $random])
            ->queryAll();

        (new \common\components\dump\Dump())->printR($random);

        return $albumsListRandom;
    }

}

