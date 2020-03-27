<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class Artists
{

    var $artist;

    function __construct($id)
    {

        $this->artist = $this->getArtist($id);

    }



    function getArtist($id){

    return (new ArtistsGetArtist())->artistsGetArtist($id);

    }



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



}

