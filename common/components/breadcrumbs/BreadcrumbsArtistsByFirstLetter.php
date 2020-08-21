<?php

namespace common\components\breadcrumbs;

use Yii;
use yii\web\NotFoundHttpException;

class BreadcrumbsArtistsByFirstLetter
{

    public function breadcrumbs($firstLetterByArtist, $getParamsByLinksPrevNext){

        $breadcrumbs['urls'][0] =  [
                'url' => 'artists',
                'text' => Yii::t('app','Artists')
            ];

        $breadcrumbs['urls'][1] =  [
            'url' => 'artists/index',
            'text' => Yii::t('app','Index')
        ];

        if ($getParamsByLinksPrevNext['page']){

            $breadcrumbs['urls'][2] =  [
                'url' => 'artists/index/' . $firstLetterByArtist['url'],
                'text' => $firstLetterByArtist['first_letter']
            ];

            $breadcrumbs['last'] = Yii::t('app','Page') . ' ' .  $getParamsByLinksPrevNext['page'];

        } else {

            $breadcrumbs['last'] = $firstLetterByArtist['first_letter'];

        }

        return $breadcrumbs;

    }


}

