<?php

namespace common\components\breadcrumbs;

use Yii;

class BreadcrumbsSong
{

    public function breadcrumbs($artistData, $albumData, $songData, $firstLetterByArtist)
    {

        $count = 0;

        $breadcrumbs['urls'][$count] = [
            'url' => 'songs',
            'text' => Yii::t('app', 'Songs')
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
        if ($albumData['url']) {
            if ($albumData['year']) {
                $breadcrumbs['urls'][++$count] = [
                    'url' => 'albums/' . $albumData['url'],
                    'text' => $albumData['name'] . ' (' . $albumData['year'] . ')'
                ];
            } else {
                $breadcrumbs['urls'][++$count] = [
                    'url' => 'albums/' . $albumData['url'],
                    'text' => $albumData['name']
                ];
            }

        }

        $breadcrumbs['last'] = $songData['name'];

        return $breadcrumbs;

    }

}

