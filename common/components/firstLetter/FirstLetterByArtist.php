<?php

namespace common\components\firstLetter;

use Yii;
use yii\web\NotFoundHttpException;

class FirstLetterByArtist
{

    public function firstLetter($artistData)
    {

        $firstLetter = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_artists_first_letters
            where 
            m_artists_first_letters.id = :id
            ', [':id' => $artistData['first_letter']])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($firstLetter);

        return $firstLetter;
    }

}

