<?php

namespace common\components\mLanguage;

use common\components\mLanguages\MLanguagesData;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class MLanguage
{

    function __construct()
    {

    }

    function data($languageID, $mLanguageID){

        return (new MLanguageData())->data($languageID, $mLanguageID);

    }

    function bySong($languageID, $mLanguageID){

        return (new MLanguageBySong())->data($languageID, $mLanguageID);

    }
}

