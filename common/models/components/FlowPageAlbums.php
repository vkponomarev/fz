<?php

namespace common\models\components;



use Yii;
use yii\web\NotFoundHttpException;

class FlowPageAlbums
{

    public function showTestTable()
    {
        //echo $languageId;
        $showTestTable = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url
            from
            m_albums
            ')
            ->queryAll();

        /*echo '<pre>';
        //var_dump($texts);
        print_r($showTestTable);
        echo '</pre>';*/

        return $showTestTable;
    }


    public function pageContentAlbum($pageId)
    {
        //echo $pageId;
        $pageContentAlbum = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url
            from
            m_albums
            where id = ' . $pageId . '
            ')
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($pageContentAlbum);
        echo '</pre>';

        if (!$pageContentAlbum) {

            throw new NotFoundHttpException('404');

        }
        return $pageContentAlbum;
    }



}

