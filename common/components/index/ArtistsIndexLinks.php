<?php

namespace common\components\index;

use Yii;
use yii\data\SqlDataProvider;

class ArtistsIndexLinks
{

    public function artistsIndexLinks()
    {
        //echo $languageId;
        $artistsIndexLinks = Yii::$app->db
            ->createCommand('
            select
            first_letter,
            url
            from
            m_artists_first_letters
            ')
            ->queryAll();


        //echo '<pre>';
        //var_dump($texts);
        //print_r($artistsIndexLinks);
        //echo '</pre>';

        return $artistsIndexLinks;
    }


}