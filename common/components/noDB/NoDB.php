<?php

namespace common\components\noDB;


/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class NoDB
{

    function realPath()
    {

        return (new NoDBRealPath())->realPath();

    }

}

