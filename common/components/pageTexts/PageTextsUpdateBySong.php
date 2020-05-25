<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateBySong

{

    public function update($songData)
    {

        Yii::$app->params['text']['title'] = str_replace('{song-name}', $songData['name'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['h1'] = str_replace('{song-name}', $songData['name'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['description'] = str_replace('{song-name}', $songData['name'], Yii::$app->params['text']['description']);

    }

}