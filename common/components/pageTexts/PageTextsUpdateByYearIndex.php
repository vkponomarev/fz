<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByYearIndex

{

    function update($getParamsByLinksPrevNext, $yearData)
    {




        if ($getParamsByLinksPrevNext['page'])
            $additionalText = ' - ' . Yii::t('app', 'Page') . ' ' . $getParamsByLinksPrevNext['page'];
        else
            $additionalText = '';

        Yii::$app->params['text']['title'] = Yii::$app->params['text']['title'] . $additionalText;
        Yii::$app->params['text']['h1'] = Yii::$app->params['text']['h1'] . $additionalText;
        Yii::$app->params['text']['description'] = Yii::$app->params['text']['description'] . $additionalText;

        Yii::$app->params['text']['title'] = str_replace('{year-name}', $yearData['name'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['h1'] = str_replace('{year-name}', $yearData['name'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['description'] = str_replace('{year-name}', $yearData['name'], Yii::$app->params['text']['description']);



    }

}