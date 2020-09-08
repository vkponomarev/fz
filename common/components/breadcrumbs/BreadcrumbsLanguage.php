<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsLanguage
{

    public function breadcrumbs($LanguagesData)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] = [
            'url' => 'languages',
            'text' => Yii::t('app', 'Languages')
        ];

         $breadcrumbs['last'] = $LanguagesData['name'];

        return $breadcrumbs;

    }

}

