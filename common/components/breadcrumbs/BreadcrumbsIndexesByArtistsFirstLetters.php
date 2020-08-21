<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsIndexesByArtistsFirstLetters
{

    public function breadcrumbs()
    {

        $breadcrumbs['urls'][0] = [
            'url' => 'artists',
            'text' => Yii::t('app', 'Artists')
        ];

        $breadcrumbs['last'] = Yii::t('app', 'Index');

    }


}

