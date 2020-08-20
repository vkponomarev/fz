<?php

namespace common\components\cms;

class Cms
{

    function __construct($id = 0)
    {

    }

    function cookieInfo($id)
    {

        return (new CmsCookieInfo())->page($id);

    }

    function byRandom($count)
    {

        return (new AlbumsByRandom())->albums($count);

    }

    function byPopularity($count)
    {

        return (new AlbumsByPopularity())->albums($count);

    }
}

