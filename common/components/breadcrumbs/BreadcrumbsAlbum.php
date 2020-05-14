<?php

namespace common\components\breadcrumbs;

use Yii;
use yii\web\NotFoundHttpException;

class BreadcrumbsAlbum
{

     function __construct()
    {

    }

    public function Breadcrumbs($albumData, $artistData)
    {

        Yii::$app->params['breadcrumbs']['urls'] = [

            0 => [
                'url' => '/artists/' . $artistData['url'],
                'text' => $artistData['name']
            ],

            1 => [
                'url' => 'albums',
                'text' => Yii::t('app','Albums')
            ],


        ];


        Yii::$app->params['breadcrumbs']['last'] = $albumData['name'];

    }

}

