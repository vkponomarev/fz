<?php

namespace common\components\languages;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class Languages
{

    function __construct()
    {

    }

    function data(){

        return (new LanguagesData())->data();

    }


}

