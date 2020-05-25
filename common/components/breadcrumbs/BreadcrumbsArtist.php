<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsArtist
{

    function __construct()
    {

    }

    public function breadcrumbs($artistData, $firstLetterData)
    {

        Yii::$app->params['breadcrumbs']['urls'][0] =
            [
                'url' => 'artists',
                'text' => Yii::t('app', 'Artists')
            ];
        Yii::$app->params['breadcrumbs']['urls'][2] =
            [
                'url' => 'artists/index/' . $firstLetterData['url'],
                'text' => $firstLetterData['first_letter']
            ];

        Yii::$app->params['breadcrumbs']['last'] = $artistData['name'];

    }

}

