<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsIndexesByArtistsFirstLetters
{

    function __construct()
    {

    }

    public function breadcrumbs()
    {

        Yii::$app->params['breadcrumbs']['urls'][0] = [
            'url' => 'artists',
            'text' => Yii::t('app', 'Artists')
        ];

        Yii::$app->params['breadcrumbs']['last'] = Yii::t('app', 'Index');

    }


}

