<?php

namespace common\components\translations;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class Translations
{

    function __construct()
    {

    }


    function bySong($songID)
    {

        return (new TranslationsBySong())->translations($songID);

    }

    function byLanguages($songID)
    {

        return (new TranslationsByLanguages())->translations($songID);

    }


}

