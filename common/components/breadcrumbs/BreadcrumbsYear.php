<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsYear
{

    public function breadcrumbs($yearData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] = [
            'url' => 'years',
            'text' => Yii::t('app', 'Years')
        ];

         $breadcrumbs['last'] = $yearData['name'];

        return $breadcrumbs;

    }

}

