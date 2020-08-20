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

        $count = 0;

        Yii::$app->params['breadcrumbs']['urls'][$count] = [
            'url' => 'songs',
            'text' => Yii::t('app', 'Songs')
        ];

        if ($firstLetterByArtist) {
            Yii::$app->params['breadcrumbs']['urls'][++$count] = [
                'url' => 'artists/index/' . $firstLetterByArtist['url'],
                'text' => $firstLetterByArtist['first_letter']
            ];

            Yii::$app->params['breadcrumbs']['urls'][++$count] = [
                'url' => 'artists/' . $artistData['url'],
                'text' => $artistData['name']
            ];
        }
        if ($albumData['url']) {
            if ($albumData['year']) {
                Yii::$app->params['breadcrumbs']['urls'][++$count] = [
                    'url' => 'albums/' . $albumData['url'],
                    'text' => $albumData['name'] . ' (' . $albumData['year'] . ')'
                ];
            } else {
                Yii::$app->params['breadcrumbs']['urls'][++$count] = [
                    'url' => 'albums/' . $albumData['url'],
                    'text' => $albumData['name']
                ];
            }

        }

        Yii::$app->params['breadcrumbs']['last'] = $songData['name'];

    }

}

