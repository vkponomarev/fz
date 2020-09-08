<?php

namespace common\components\year;

use Yii;
use yii\web\NotFoundHttpException;

class YearBySong
{

    public function data($yearID)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_years
            where 
            m_years.id = :yearID
            ', [':yearID' => $yearID])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($data);

        return $data;
    }

}

