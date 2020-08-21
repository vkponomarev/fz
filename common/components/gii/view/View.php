<?php

namespace common\components\gii\view;






class View
{




    function __construct()
    {

    }


    function generateArtists($valueOne, $valueTwo, $languagesData){

        (new ViewGenerateArtists())->generate($valueOne, $valueTwo, $languagesData);

    }

    function generatePages($languagesData){

        (new ViewGeneratePages())->generate($languagesData);

    }

    function generatePagesIndex($languagesData){

        (new ViewGeneratePagesIndex())->generate($languagesData);

    }

    function generatePagesArtists($languagesData){

        (new ViewGeneratePagesArtists())->generate($languagesData);

    }

    function generatePagesAlbums($languagesData){

        (new ViewGeneratePagesAlbums())->generate($languagesData);

    }
    function generatePagesSongs($languagesData){

        (new ViewGeneratePagesSongs())->generate($languagesData);

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
