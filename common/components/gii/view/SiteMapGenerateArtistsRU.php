<?php

namespace common\components\gii\siteMap;


use common\components\artists\Artists;
use common\components\bigData\BigData;

class SiteMapGenerateArtistsRU
{


    function generate($languagesData)
    {

        /**
         * 1. Создаем файлы для артистов
         */

        $artists = new Artists();
        $artistsLinks = $artists->bySiteMap();

        $artistsLinksCount = count($artistsLinks);
        $languagesDataCount = count($languagesData);

        //$siteMapFiles = ceil($artistsLinksCount * $languagesDataCount / 49999);

        // 160000 * 24 / 49999 = 77; Получается 77 файлов сайт мап для артистов;

        $countLimit = 0;
        $countFiles = 0;
        $count = 0;
        $siteMapUrls ='';

        foreach ($artistsLinks as $artistLink) {
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap-artists');

            //Проходим по всем артистам
            $countLang = 0;
            foreach ($languagesData as $language) {

                if ($language['url'] <> 'ru')
                    continue;

                $countLang++;
                $countLimit++;

                //Добавляем к переменной данные пока $countLimit не станет 49999

                $siteMapUrls .= '
<url>
      <loc>https://flowlez.com/' . $language['url'] . '/artists/' . $artistLink['url'] . '/</loc>
</url>
';
                if (($countLimit >= 49998) or ($artistsLinksCount == $count)) {

                    $countFiles++;

                    $siteMapContent = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
' . $siteMapUrls . '
</urlset>';

                    // Создаем файл
                    $siteMap = new SiteMap();
                    $fileName = 'sitemap_artists_ru_' . $countFiles;
                    (new \common\components\dump\Dump())->printR($siteMap->realPath());
                    $siteMap->generateFile($siteMapContent, $fileName . '.xml',  $siteMap->realPath() . 'gii/sitemap/ru/artists/');

                    unset($siteMapContent);
                    unset($siteMapUrls);
                    unset($countLimit);
                    unset($fileName);

                    $siteMapContent = '';
                    $siteMapUrls = '';
                    $fileName = '';
                    $countLimit = 0;

                    // https://flowlez.com/sitemap/sitemap_artists_1.xml/

                }

            }

        }




    }

}
