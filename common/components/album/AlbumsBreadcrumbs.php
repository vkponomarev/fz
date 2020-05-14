<?php

namespace common\components\albums;

use Yii;
use yii\web\NotFoundHttpException;

class AlbumsBreadcrumbs
{

     function __construct($id = 0, $artist = 0)
    {

        if ($id){
            //$firstLetter = $this->firstLetter($id);
            $this->artistBreadcrumbs($artist);
        } else
        $this->artistsBreadcrumbs();

    }

   /* public function firstLetter($id)
    {

        $firstLetter = Yii::$app->db
            ->createCommand('
            select
            first_letter,
            url
            from
            m_artists_first_letters
            where 
            id = :id
            ', [':id' => $id])
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($firstLetter);
        echo '</pre>';

        return $firstLetter;
    }*/

    public function artistBreadcrumbs($artist){

        Yii::$app->params['breadcrumbs']['urls'] = [
            0 => [
                'url' => 'artists',
                'text' => Yii::t('app','Artists')
            ],
            1 => [
                'url' => 'index/artists',
                'text' => Yii::t('app','Index')
            ],
            2 => [
                'url' => 'index/artists/' . $artist['url'],
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

