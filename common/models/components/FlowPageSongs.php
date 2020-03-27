<?php

namespace common\models\components;



use Yii;
use yii\web\NotFoundHttpException;

class FlowPageSongs
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
            m_songs
            ')
            ->queryAll();

        /*echo '<pre>';
        //var_dump($texts);
        print_r($showTestTable);
        echo '</pre>';*/

        return $showTestTable;
    }


    public function pageContentSong($pageId)
    {
        //echo $pageId;
        $pageContentSong = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url
            from
            m_songs
            where id = ' . $pageId . '
            ')
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($pageContentSong);
        echo '</pre>';

        if (!$pageContentSong) {

            throw new NotFoundHttpException('404');

        }
        return $pageContentSong;
    }



}

