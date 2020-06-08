<?php

namespace common\components\languages;

use common\models\Languages;
use Yii;
use yii\web\NotFoundHttpException;

class LanguagesData
{

    public function data()
    {

        //$data = Languages::find()->where(['active' => 1])->all();
        $data = Yii::$app->db
            ->createCommand('
            select
            *
            from
            languages
            where
            active = 1
            ')
            ->queryAll();

        return $data;

    }

}

