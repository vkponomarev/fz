<?php

namespace common\components\years;

use Yii;
use yii\web\NotFoundHttpException;

class YearsData
{

    public function data()
    {

        $data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            m_years
            ')
            ->queryAll();

        //(new \common\components\dump\Dump())->printR($data);

        return $data;
    }

}

