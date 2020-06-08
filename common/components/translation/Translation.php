<?php

namespace common\components\translation;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class Translation
{

    function __construct()
    {

    }

    function save($songData, $languageData, $translationText)
    {

        (new TranslationSave())->save($songData, $languageData, $translationText);

    }


    function saveOrigin($songData, $languageData, $translationText)
    {

        (new TranslationSaveOrigin())->save($songData, $languageData, $translationText);

    }

    function byLanguage($translationsBySong, $languageID)
    {

        return (new TranslationByLanguage())->translation($translationsBySong, $languageID);

    }


    function proxy()
    {

        return (new TranslationProxyList())->proxy();

    }

    function userAgent()
    {

        return (new TranslationUserAgentList())->userAgent();

    }

    function timeOut()
    {

        return (new TranslationTimeOut())->timeOut();

    }

}

