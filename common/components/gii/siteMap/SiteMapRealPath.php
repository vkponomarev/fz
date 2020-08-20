<?php

namespace common\components\gii\siteMap;


class SiteMapRealPath
{

    function realPath()
    {

        return realpath($_SERVER['DOCUMENT_ROOT'] . '/../../') . "/frontend/views/";

    }

}
