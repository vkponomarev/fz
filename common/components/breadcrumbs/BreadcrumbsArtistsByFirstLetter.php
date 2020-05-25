<?php

namespace common\components\breadcrumbs;

use Yii;
use yii\web\NotFoundHttpException;

class BreadcrumbsArtistsByFirstLetter
{

     function __construct()
    {

    }

    public function breadcrumbs($firstLetterByArtist, $getParamsByLinksPrevNext){

        Yii::$app->params['breadcrumbs']['urls'][0] =  [
                'url' => 'artists',
                'text' => Yii::t('app','Artists')
            ];

        Yii::$app->params['breadcrumbs']['urls'][1] =  [
            'url' => 'artists/index',
            'text' => Yii::t('app','Index')
        ];

        if ($getParamsByLinksPrevNext['page']){

            Yii::$app->params['breadcrumbs']['urls'][2] =  [
                'url' => 'artists/index/' . $firstLetterByArtist['url'],
                'text' => $firstLetterByArtist['first_letter']
            ];

            Yii::$app->params['breadcrumbs']['last'] = Yii::t('app','Page') . ' ' .  $getParamsByLinksPrevNext['page'];

        } else {

            Yii::$app->params['breadcrumbs']['last'] = $firstLetterByArtist['first_letter'];

        }







    }


}

