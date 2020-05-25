<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsSong
{

    function __construct()
    {

    }

    public function breadcrumbs($artistData, $albumData, $songData, $firstLetterByArtist)
    {

        Yii::$app->params['breadcrumbs']['urls'][0] = [
            'url' => 'artists',
            'text' => Yii::t('app', 'Artists')
        ];

        Yii::$app->params['breadcrumbs']['urls'][1] = [
            'url' => 'artists/index/' . $firstLetterByArtist['url'],
            'text' => $firstLetterByArtist['first_letter']
        ];

        Yii::$app->params['breadcrumbs']['urls'][2] = [
            'url' => 'artists/' . $artistData['url'],
            'text' => $artistData['name']
        ];

        if ($albumData['url']) {
            if ($albumData['year']) {
                Yii::$app->params['breadcrumbs']['urls'][3] = [
                    'url' => 'albums/' . $albumData['url'],
                    'text' => $albumData['name'] . ' (' . $albumData['year'] . ')'
                ];
            } else {
                Yii::$app->params['breadcrumbs']['urls'][3] = [
                    'url' => 'albums/' . $albumData['url'],
                    'text' => $albumData['name']
                ];
            }

        }

        Yii::$app->params['breadcrumbs']['last'] = $songData['name'];

    }

}

