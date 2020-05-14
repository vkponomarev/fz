<?php

namespace common\components\firstLetter;

use Yii;
use yii\web\NotFoundHttpException;

class FirstLetterByArtist
{

    public function firstLetter($id)
    {

        $firstLetter = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_artists_first_letters
            where 
            m_artists_first_letters.id = :id
            ', [':id' => $id])
            ->queryOne();

        (new \common\components\dump\Dump())->printR($firstLetter);

        return $firstLetter;
    }

/**
select
m_artists.name,
m_artists.photos,
m_artists.first_letter,
m_artists_first_letters.first_letter,
m_artists_first_letters.url
from
m_artists
left join m_artists_first_letters on m_artists_first_letters.id = m_artists.first_letter
where
m_artists.id = 30585
 */

}

