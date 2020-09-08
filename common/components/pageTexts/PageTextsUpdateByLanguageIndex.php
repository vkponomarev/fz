<?php

namespace common\components\pageTexts;

use Yii;

class PageTextsUpdateByLanguageIndex

{

    function update($getParamsByLinksPrevNext, $languageData)
    {

        if ($getParamsByLinksPrevNext['page'])
            $additionalText = ' - ' . Yii::t('app', 'Page') . ' ' . $getParamsByLinksPrevNext['page'];
        else
            $additionalText = '';

        Yii::$app->params['text']['title'] = Yii::$app->params['text']['title'] . $additionalText;
        Yii::$app->params['text']['h1'] = Yii::$app->params['text']['h1'] . $additionalText;
        Yii::$app->params['text']['description'] = Yii::$app->params['text']['description'] . $additionalText;

        Yii::$app->params['text']['title'] = str_replace('{language-name}', $languageData['name_second'], Yii::$app->params['text']['title']);
        Yii::$app->params['text']['h1'] = str_replace('{language-name}', $languageData['name_second'], Yii::$app->params['text']['h1']);
        Yii::$app->params['text']['description'] = str_replace('{language-name}', $languageData['name_second'], Yii::$app->params['text']['description']);

    }

}