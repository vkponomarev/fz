<?php

namespace common\components\urlCheck;


use Yii;
use yii\web\NotFoundHttpException;




class UrlCheckTrueUrl
{

    public function trueUrl($id, $table)
    {
        //echo $pageId;
        $trueUrl = Yii::$app->db
            ->createCommand('
            select
            id,
            url
            from
            ' . $table . '
            where id = :id
            ',[':id' => $id])
            ->queryOne();

        //echo '<pre>';
        //var_dump($texts);
        //print_r($pageContentAlbum);
        //echo '</pre>';

        if (!$trueUrl) {

            throw new NotFoundHttpException('404');

        }
        return $trueUrl;
    }

}
