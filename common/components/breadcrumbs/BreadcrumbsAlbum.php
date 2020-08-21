<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsAlbum
{

    public function breadcrumbs($albumData, $artistData, $firstLetterByArtist)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] = [
            'url' => 'albums',
            'text' => Yii::t('app', 'Albums')
        ];

        if ($firstLetterByArtist) {
            $breadcrumbs['urls'][++$count] = [
                'url' => 'artists/index/' . $firstLetterByArtist['url'],
                'text' => $firstLetterByArtist['first_letter']
            ];

            $breadcrumbs['urls'][++$count] = [
                'url' => 'artists/' . $artistData['url'],
                'text' => $artistData['name']
            ];
        }

        if ($albumData['year'])
            $breadcrumbs['last'] = $albumData['name'] . ' (' . $albumData['year'] . ')';
        else
            $breadcrumbs['last'] = $albumData['name'];

        return $breadcrumbs;

    }

}

