<?php

namespace common\components\index;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsIndexBreadcrumbs
{

     function __construct($id = 0, $artist = 0)
    {

        if ($id){
            //$firstLetter = $this->firstLetter($id);
            $this->artistBreadcrumbs($artist);
        } else
        $this->artistsBreadcrumbs();

    }

    public function artistBreadcrumbs($artist){

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
                'url' => 'artists/index/' . $artist['url'],
                'text' => $artist['first_letter']
            ],

        ];


        Yii::$app->params['breadcrumbs']['last'] = $artist['name'];

    }


    public function artistsBreadcrumbs(){
        echo 'sef';
        Yii::$app->params['breadcrumbs']['last'] = Yii::t('app','Artists');
    }


}

