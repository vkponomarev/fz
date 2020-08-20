<?php

namespace common\components\gii\siteMap;


use common\components\languages\Languages;

class SiteMapGenerate
{


    function generate($name)
    {

        /**
         * 1. Создаем файлы для артистов
         * 2. Создаем файлы для альбомов
         * 3. Создаем файлы для песен
         * 4. Создаем файл индекса карты сайтов
         */

        $siteMap = new SiteMap();

        $languages = new Languages();
        $languagesData = $languages->data();

        /*
    sitemap-artists-all
    sitemap-albums-all
    sitemap-songs-all
    sitemap-all

    sitemap-artists-ru
    sitemap-albums-ru
    sitemap-songs-ru
    sitemap-ru
*/

        if ($name == 'sitemap-artists-all') {

            $siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/artists/');
            $siteMap->generateArtists($languagesData);

        }

        if ($name == 'sitemap-artists-ru') {

            //(new \common\components\dump\Dump())->printR($name);
            $siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/ru/artists/');
            $siteMap->generateArtistsRU($languagesData);

        }

        if ($name == 'sitemap-albums-all') {

            $siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/albums/');
            $siteMap->generateAlbums($languagesData);

        }

        if ($name == 'sitemap-albums-ru') {

            //(new \common\components\dump\Dump())->printR($name);
            $siteMap->cleanPath($siteMap->realPath() . '/gii/sitemap/ru/artists/');
            $siteMap->generateArtistsRU($languagesData);

        }

        //$siteMapGenerateAlbums = $siteMap->generateAlbums();
        //$siteMapGenerateSongs = $siteMap->generateSongs();

        //$siteMapGenerateIndex = $siteMap->generateIndex();

        //(new \common\components\dump\Dump())->printR($siteMapGenerateArtists);

        //return true;

    }

}
