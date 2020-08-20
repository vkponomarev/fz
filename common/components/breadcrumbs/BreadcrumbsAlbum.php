<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsAlbum
{

    function __construct()
    {

    }

    public function Breadcrumbs($albumData, $artistData, $firstLetterByArtist)
    {

        $count = 0;

        Yii::$app->params['breadcrumbs']['urls'][$count] = [
            'url' => 'albums',
            'text' => Yii::t('app', 'Albums')
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

        if ($albumData['year'])
            Yii::$app->params['breadcrumbs']['last'] = $albumData['name'] . ' (' . $albumData['year'] . ')';
        else
            Yii::$app->params['breadcrumbs']['last'] = $albumData['name'];

    }

}

