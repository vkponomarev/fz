<?php

namespace common\components\firstLetter;

use Yii;
use yii\web\NotFoundHttpException;

class FirstLetterData
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

        //(new \common\components\dump\Dump())->printR($firstLetter);

        return $firstLetter;
    }

}

