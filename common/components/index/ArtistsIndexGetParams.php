<?php

namespace common\components\index;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsIndexGetParams
{

    public function getParams()
    {

        $getParams = [
            'page' => Yii::$app->request->get('page'),

        ];

        return $getParams;

    }


}

