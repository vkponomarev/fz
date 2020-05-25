<?php

namespace common\components\getParams;

use Yii;
use yii\data\SqlDataProvider;

class GetParamsByLinksPrevNext

{

    public function params()
    {

        $params = [

            'page' => Yii::$app->request->get('page'),

        ];

        return $params;

    }

}