<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByGenre

{

    public function update($genreData)
    {

        Yii::$app->params['text']['title'] = str_replace('{genre-name}', $genreData['name'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['h1'] = str_replace('{genre-name}', $genreData['name'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['description'] = str_replace('{genre-name}', $genreData['name'], Yii::$app->params['text']['description']);

    }

}