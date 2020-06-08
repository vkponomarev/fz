<?php

namespace common\components\language;

use common\models\Languages;
use Yii;
use yii\web\NotFoundHttpException;

class LanguageByCode
{

    public function language($languageCode)
    {

        $language = Languages::find()->where(['url' => $languageCode])->one();

        return $language;

    }

}

