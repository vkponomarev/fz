<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsSong
{

    public function breadcrumbs($genreData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] = [
            'url' => 'genres',
            'text' => Yii::t('app', 'Genres')
        ];

         $breadcrumbs['last'] = $genreData['name'];

        return $breadcrumbs;

    }

}

