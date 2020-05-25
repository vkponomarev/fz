<?php

namespace common\components\years;

use Yii;
use yii\web\NotFoundHttpException;

class YearsData
{

    public function data($id)
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_songs
            where 
            id = :id
            ', [':id' => $id])
            ->queryOne();

        //(new \common\components\dump\Dump())->printR($data);

        return $data;
    }

}

