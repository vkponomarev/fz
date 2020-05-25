<?php

namespace common\components\breadcrumbs;

use Yii;
use yii\web\NotFoundHttpException;

class BreadcrumbsAlbum
{

     function __construct()
    {

    }

    public function Breadcrumbs($albumData, $artistData, $firstLetterByArtist)
    {

        Yii::$app->params['breadcrumbs']['urls'] = [

            0 => [
                'url' => 'artists',
                'text' => Yii::t('app','Artists')
            ],

            1 => [
                'url' => 'artists/index/' . $firstLetterByArtist['url'],
                'text' => $firstLetterByArtist['first_letter']
            ],

            2 => [
                'url' => 'artists/' . $artistData['url'],
                'text' => $artistData['name']
            ],

        ];

        if ($albumData['year'])
            Yii::$app->params['breadcrumbs']['last'] = $albumData['name'] . ' (' . $albumData['year'] . ')';
        else
            Yii::$app->params['breadcrumbs']['last'] = $albumData['name'];
    }

}

