<?php

namespace common\components\translation;

use Yii;
use yii\web\NotFoundHttpException;

class TranslationSave
{

    public function save($songData, $languageData, $translationText)
    {

        $model = new \common\models\MSongsTranslations();
        $model->m_songs_id = $songData['id'];
        $model->languages_id = $languageData['id'];
        $model->text = $translationText;
        $model->origin = 0;
        $model->save();

    }

}

