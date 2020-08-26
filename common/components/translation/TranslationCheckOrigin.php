<?php

namespace common\components\translation;

use Yii;

class TranslationCheckOrigin
{

    public function check($songsID, $languageID)
    {

        $check = Yii::$app->db
            ->createCommand('
            select
            m_songs_translations.origin
            from
            m_songs_translations
            where
            m_songs_translations.m_songs_id = :songsID
            and 
            m_songs_translations.languages_id = :languageID
            ', [':songsID' => $songsID, ':languageID' => $languageID])
            ->queryOne();
        //echo $id;
        //(new \common\components\dump\Dump())->printR($artistsAlbums);

        if ($check['origin'] == 1)
            $check = true;
        else
            $check = false;

        return $check;
    }

}

