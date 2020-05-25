<?php

namespace common\components\index;

use Yii;
use yii\data\SqlDataProvider;

class ArtistsIndexLinksLetterName
{


    public function artistsIndexLinksName($firstLetterId)
    {

        $artistsIndexLinksName = Yii::$app->db->createCommand('
            SELECT 
            first_letter 
            FROM 
            m_artists_first_letters
            where
            id=:firstLetterId
            ', [':firstLetterId' => $firstLetterId])->queryOne();

        return $artistsIndexLinksName;
    }

}