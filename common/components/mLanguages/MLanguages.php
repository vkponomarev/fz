<?php

namespace common\components\mLanguages;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class MLanguages
{

    function __construct()
    {

    }

    function data($languageID){

        return (new MLanguagesData())->data($languageID);

    }


}

