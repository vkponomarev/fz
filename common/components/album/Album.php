<?php

namespace common\components\album;

class Album
{

    function __construct($id = 0)
    {

    }

    function data($id)
    {

        return (new AlbumData())->data($id);

    }

    function updatePageTexts($albumData)
    {

        (new AlbumUpdatePageTexts())->update($albumData);

    }

}

