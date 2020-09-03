<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsArtist
{

    public function breadcrumbs($artistData, $firstLetterData)
    {

        $breadcrumbs['urls'][0] =
            [
                'url' => 'artists',
                'text' => Yii::t('app', 'Artists')
            ];
        $breadcrumbs['urls'][2] =
            [
                'url' => 'artists/index/' . $firstLetterData['url'],
                'text' => $firstLetterData['first_letter']
            ];

        $breadcrumbs['last'] = $artistData['name'];

        return $breadcrumbs;

    }

}

