<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByArtist

{

    public function update($artistData)
    {

        Yii::$app->params['text']['title'] = str_replace('{artist-name}', $artistData['name'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['h1'] = str_replace('{artist-name}', $artistData['name'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['description'] = str_replace('{artist-name}', $artistData['name'], Yii::$app->params['text']['description']);

    }

}