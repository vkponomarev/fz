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

    function updateByGenreIndex($getParamsByLinksPrevNext, $genreData)
    {

        (new PageTextsUpdateByGenreIndex())->update($getParamsByLinksPrevNext, $genreData);

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

    function updateByGenre($genreData)
    {

        (new PageTextsUpdateByGenre())->update($genreData);

    }

}

