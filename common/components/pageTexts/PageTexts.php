<?php

namespace common\components\pageTexts;

class PageTexts
{

    function __construct()
    {

    }

    function updateByArtistsIndex($getParamsByLinksPrevNext, $firstLetterByArtist)
    {

        (new PageTextsUpdateByArtistsIndex())->update($getParamsByLinksPrevNext, $firstLetterByArtist);

    }

    function updateByAlbum($albumData)
    {

        (new PageTextsUpdateByAlbum())->update($albumData);

    }

    function updateByArtist($artistData)
    {

        (new PageTextsUpdateByArtist())->update($artistData);

    }

    function updateBySong($songData)
    {

        (new PageTextsUpdateBySong())->update($songData);

    }


}

