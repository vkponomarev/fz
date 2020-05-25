<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByAlbum

{

    public function update($albumData)
    {

        if ($albumData['year'])
            $albumName = $albumData['name'] . ' (' . $albumData['year'] . ')';
        else
            $albumName = $albumData['name'];


        Yii::$app->params['text']['title'] = str_replace('{album-name}', $albumName, Yii::$app->params['text']['title']);
        Yii::$app->params['text']['h1'] = str_replace('{album-name}', $albumName, Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['description'] = str_replace('{album-name}', $albumName, Yii::$app->params['text']['description']);

    }

}