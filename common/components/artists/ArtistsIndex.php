<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class ArtistsIndex
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
            m_artists
            ')
            ->queryAll();

        /*echo '<pre>';
        //var_dump($texts);
        print_r($showTestTable);
        echo '</pre>';*/

        return $showTestTable;
    }


    public function pageContentArtist($pageId)
    {
        //echo $languageId;
        $pageContentArtist = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url
            from
            m_artists
            where id = ' . $pageId . '
            ')
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($pageContentArtist);
        echo '</pre>';

        if (!$pageContentArtist) {

            throw new NotFoundHttpException('404');

        }
        return $pageContentArtist;
    }




    public function pageArtistIndex($pageId)
    {
        //echo $languageId;
        $pageArtistIndex = Yii::$app->db
            ->createCommand('
            select
            id,
            first_letter,
            url
            from
            m_artists_has_first_letter
            where id = ' . $pageId . '
            ')
            ->queryOne();

        echo '<pre>';
        //var_dump($texts);
        print_r($pageArtistIndex);
        echo '</pre>';

        if (!$pageArtistIndex) {

            throw new NotFoundHttpException('404');

        }
        return $pageArtistIndex;
    }







}

