<?php

namespace common\components\gii\view;






class View
{




    function __construct()
    {

    }


    function generate($name){

        (new SiteMapGenerate())->generate($name);

    }

    function generateArtists($valueOne, $valueTwo, $languagesData){

        (new ViewGenerateArtists())->generate($valueOne, $valueTwo, $languagesData);

    }

    function generateArtistsRU($languagesData){

        (new SiteMapGenerateArtistsRU())->generate($languagesData);

    }


    function generateAlbums($start, $end, $languagesData){

        (new SiteMapGenerateAlbums())->generate($start, $end, $languagesData);

    }


    function generateAlbumsRU($languagesData){

        (new SiteMapGenerateAlbumsRU())->generate($languagesData);

    }

    function generateSongs($start, $end, $languagesData){

        (new SiteMapGenerateSongs())->generate($start, $end, $languagesData);

    }

    function generateSongsRU($start, $end, $languagesData){

        (new SiteMapGenerateSongsRU())->generate($start, $end, $languagesData);

    }

    function generateMainFiles(){

        (new SiteMapGenerateMainFiles())->generate();

    }


    function cleanPath($path){

        (new ViewCleanPath())->clean($path);

    }

    function realPath(){

        return (new ViewRealPath())->realPath();

    }

    function generateFile($content, $fileName, $filePath){

        (new ViewGenerateFile())->generate($content, $fileName, $filePath);

    }

    function generateFileArray($array, $fileName, $filePath){

        (new ViewGenerateFileArray())->generate($array, $fileName, $filePath);

    }

}
