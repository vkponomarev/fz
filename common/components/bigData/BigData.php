<?php

namespace common\components\bigData;

use Yii;

class BigData
{

    var $processCount; //
    var $ProcessName; //
    //var $artistsIndexLinksLetterName; // Название конкретной Буквы для страницы этой буквы для крошек

//    function __construct($processCount, $ProcessName)
//   {
//
//    }

    function takeData()
    {

        $artistsIndexLinks = (new ArtistsIndexLinks())->artistsIndexLinks();

        return $artistsIndexLinks;

    }



    function saveData($processCount, $ProcessName)
    {

        $saveData = (new SaveData())->saveData($processCount, $ProcessName);

        return $saveData;

    }

    function loadData($ProcessName)
    {

        $loadData = (new LoadData())->loadData($ProcessName);

        return $ProcessName;

    }

    function viewData()
    {

        $artistsIndexLinks = (new ArtistsIndexLinks())->artistsIndexLinks();

        return $artistsIndexLinks;

    }



}

