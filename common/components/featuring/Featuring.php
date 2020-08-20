<?php

namespace common\components\featuring;

/**
 * Class Song
 * @package common\components\songs
 *
 *
 *
 *
 *
 */
class Featuring
{

    function __construct()
    {

    }


    function bySong($songID)
    {

        return (new FeaturingBySong())->featuring($songID);

    }

    function byArtist($artistID)
    {

        return (new FeaturingByArtist())->featuring($artistID);

    }


}

