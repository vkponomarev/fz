<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsBreadcrumbs
{

    public function artistsBreadcrumbs($id)
    {

        $artistsBreadcrumbs = Yii::$app->db
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

        /*echo '<pre>';
        //var_dump($texts);
        print_r($showTestTable);
        echo '</pre>';*/

        return $artistsBreadcrumbs;
    }



}

