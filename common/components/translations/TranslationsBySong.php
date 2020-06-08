<?php

namespace common\components\translations;

use Yii;
use yii\web\NotFoundHttpException;

class TranslationsBySong
{

    public function translations($songID)
    {

        $translations = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_songs_translations
            where
            m_songs_id = :id
            ', [':id' => $songID])
            ->queryAll();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        return $translations;

    }

}

