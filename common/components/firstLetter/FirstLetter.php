<?php

namespace common\components\firstLetter;

use Yii;
use yii\web\NotFoundHttpException;

class FirstLetter
{

    var $firstLetter; // Основная информация об артисте.


    function __construct($id = 0)
    {

    }

    function artist($id){

        return (new FirstLetterByArtist())->firstLetter($id);

    }


    function data($id){

    return (new ArtistData())->artistData($id);

    }


    function songs($id){

        return (new ArtistSongs())->artistSongs($id);

    }

    function breadcrumbs($id = 0, $artist = 0){

        (new ArtistBreadcrumbs($id, $artist));

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

