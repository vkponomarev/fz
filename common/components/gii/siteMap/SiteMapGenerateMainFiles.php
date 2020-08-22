<?php

namespace common\components\gii\siteMap;


use common\components\bigData\BigData;

class SiteMapGenerateMainFiles
{


    function generate()
    {

        /**
         * 1. Создаем основные файлы для сатмапов
         */

        $siteMap = new SiteMap();
        $dir = $siteMap->realPath();

        //$siteMapArtistsAll = array_slice(scandir($dir . '/gii/sitemap/all/'), 2);
        //$siteMapAlbumsAll = array_slice(scandir($dir . '/gii/sitemap/all/'), 2);
        //$siteMapSongsAll = array_slice(scandir($dir . '/gii/sitemap/all/'), 2);

        $siteMapListAll = array_slice(scandir($dir . '/gii/sitemap/all/'), 2);

        //$siteMapListAll = array_merge($siteMapArtistsAll, $siteMapAlbumsAll);
        //$siteMapListAll = array_merge($siteMapListAll, $siteMapSongsAll);
        //array_slice(scandir('/path/to/directory/'), 2);

        //$siteMapArtistsRu = array_slice(scandir($dir . '/gii/sitemap/ru/artists/'), 2);
        //$siteMapAlbumsRu = array_slice(scandir($dir . '/gii/sitemap/ru/albums/'), 2);
        //$siteMapSongsRu = array_slice(scandir($dir . '/gii/sitemap/ru/songs/'), 2);

        //$siteMapListRu = array_merge($siteMapArtistsRu, $siteMapAlbumsRu);
        //$siteMapListRu = array_merge($siteMapListRu, $siteMapSongsRu);

        //(new \common\components\dump\Dump())->printR($siteMapListRu);

        $countLimit = 0;
        $countFiles = 0;
        $count = 0;
        $siteMapUrls = '';

        foreach ($siteMapListAll as $one) {
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap-all');

            //Проходим по всем артистам
            $countLang = 0;
            //Добавляем к переменной данные пока $countLimit не станет 49999

            $siteMapUrls .= '
<sitemap>
      <loc>https://flowlez.com/' . $one . '</loc>
</sitemap>
';

        }

        $siteMapContent = '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
' . $siteMapUrls . '
</sitemapindex>';

        // Создаем файл
        $siteMap = new SiteMap();
        $fileName = 'sitemap_all.xml';
        //(new \common\components\dump\Dump())->printR($siteMap->realPath());
        $siteMap->generateFile($siteMapContent, $fileName, $siteMap->realPath() . 'gii/sitemap/all/');

        unset($siteMapContent);
        unset($siteMapUrls);
        unset($countLimit);
        unset($fileName);

        $siteMapContent = '';
        $siteMapUrls = '';
        $fileName = '';
        $countLimit = 0;

//////////////////////////
/// //////////////////////
///
/*
        foreach ($siteMapListRu as $one) {
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap-ru');

            //Проходим по всем артистам
            $countLang = 0;
            //Добавляем к переменной данные пока $countLimit не станет 49999

            $siteMapUrls .= '
<sitemap>
      <loc>https://flowlez.com/ru/sitemapru/' . $one . '/</loc>
</sitemap>
';

        }

        $siteMapContent = '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
' . $siteMapUrls . '
</sitemapindex>';

        // Создаем файл
        $siteMap = new SiteMap();
        $fileName = 'sitemap_ru.xml';
        //(new \common\components\dump\Dump())->printR($siteMap->realPath());
        $siteMap->generateFile($siteMapContent, $fileName, $siteMap->realPath() . 'gii/sitemap/main-files/');

        unset($siteMapContent);
        unset($siteMapUrls);
        unset($countLimit);
        unset($fileName);

        $siteMapContent = '';
        $siteMapUrls = '';
        $fileName = '';
        $countLimit = 0;

*/
    }

}
