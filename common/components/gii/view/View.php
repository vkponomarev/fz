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

    function generateSongs($valueOne, $valueTwo, $languagesData){

        (new ViewGenerateSongs())->generate($valueOne, $valueTwo, $languagesData);

    }

    function generateAlbums($valueOne, $valueTwo, $languagesData){

        (new ViewGenerateAlbums())->generate($valueOne, $valueTwo, $languagesData);

    }


    function generateLanguages($languagesData){

        (new ViewGenerateLanguages())->generate($languagesData);

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

    function generatePagesGenres($languagesData){

        (new ViewGeneratePagesGenres())->generate($languagesData);

    }

    function generatePagesLanguages($languagesData){

        (new ViewGeneratePagesLanguages())->generate($languagesData);

    }

    function generatePagesYears($languagesData){

        (new ViewGeneratePagesYears())->generate($languagesData);

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
