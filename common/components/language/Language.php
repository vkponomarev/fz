<?php

namespace common\components\language;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class Language
{

    function __construct()
    {

    }

    function byCode(){

        (new TranslationSave())->language();

    }


}

