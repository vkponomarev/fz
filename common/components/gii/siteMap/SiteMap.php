<?php

namespace common\components\gii\siteMap;


class SiteMap
{




    function __construct()
    {

    }


    function generate($name){

        (new SiteMapGenerate())->generate($name);

    }

    function generateArtists($languagesData){

        (new SiteMapGenerateArtists())->generate($languagesData);

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

        (new SiteMapCleanPath())->clean($path);

    }

    function realPath(){

        return (new SiteMapRealPath())->realPath();

    }

    function generateFile($siteMapContent, $fileName, $filePath){

        (new SiteMapGenerateFile())->generate($siteMapContent, $fileName, $filePath);

    }

}
