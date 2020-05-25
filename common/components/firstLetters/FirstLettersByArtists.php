<?php

namespace common\components\firstLetters;

use Yii;
use yii\web\NotFoundHttpException;

class FirstLettersByArtists
{

    public function firstLetters()
    {

        $firstLetters = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_artists_first_letters
            where
            active = 1
            ')
            ->queryOne();

        (new \common\components\dump\Dump())->printR($firstLetters);

        return $firstLetters;
    }

}

