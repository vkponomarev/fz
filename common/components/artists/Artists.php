<?php

namespace common\components\artists;

use Yii;
use yii\web\NotFoundHttpException;

class Artists
{

    var $artist; // Основная информация об артисте.
    var $albums; // Список альбомов.
    var $songs; // Список песен.

    function __construct($id = 0)
    {

    }

    function data($id){

    return (new ArtistsData())->artistsData($id);

    }

    function albums($id){

        return (new ArtistsAlbums())->artistsAlbums($id);

    }

    function songs($id){

        return (new ArtistsSongs())->artistsSongs($id);

    }

    function breadcrumbs($id = 0, $artist = 0){

        (new ArtistsBreadcrumbs($id, $artist));

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
            limit 0,30
            ')
            ->queryAll();

        /*echo '<pre>';
        //var_dump($texts);
        print_r($showTestTable);
        echo '</pre>';*/

        return $showTestTable;
    }



}

