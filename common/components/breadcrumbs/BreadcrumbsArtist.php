<?php

namespace common\components\breadcrumbs;

use Yii;
use yii\web\NotFoundHttpException;

class BreadcrumbsArtist
{

     function __construct()
    {

    }

    public function breadcrumbs($artistData, $firstLetterData){

        Yii::$app->params['breadcrumbs']['urls'] = [
            0 => [
                'url' => 'artists',
                'text' => Yii::t('app','Artists')
            ],
            1 => [
                'url' => 'artists/index',
                'text' => Yii::t('app','Index')
            ],
            2 => [
                'url' => 'artists/index/' . $firstLetterData['url'],
                'text' => $firstLetterData['first_letter']
            ],

        ];


        Yii::$app->params['breadcrumbs']['last'] = $artistData['name'];

    }


}

