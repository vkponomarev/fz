<?php

namespace common\components\gii\siteMap;


use common\components\albums\Albums;
use common\components\bigData\BigData;
use common\components\songs\Songs;

class SiteMapGenerateSongs
{


    function generate($start, $end, $languagesData)
    {

        /**
         * 1. Создаем файлы для артистов
         */

        $songs = new Songs();
        $songsLinks = $songs->bySiteMap($start, $end);

        $fileNameAdd = $start++;

        $songsLinksCount = count($songsLinks);
        $languagesDataCount = count($languagesData);

        //$siteMapFiles = ceil($artistsLinksCount * $languagesDataCount / 49999);

        // 160000 * 24 / 49999 = 77; Получается 77 файлов сайт мап для артистов;

        $countLimit = 0;
        $countFiles = 0;
        $count = 0;
        $siteMapUrls ='';

        foreach ($songsLinks as $songLink) {
            $count++;
            $bigData = new BigData();
            $bigData->saveData($count, 'sitemap-songs');

            //Проходим по всем артистам
            $countLang = 0;
            foreach ($languagesData as $language) {
                $countLang++;
                $countLimit++;

                //Добавляем к переменной данные пока $countLimit не станет 49998

                $siteMapUrls .= '
<url>
      <loc>https://flowlez.com/' . $language['url'] . '/songs/' . $songLink['url'] . '/</loc>
</url>
';
                if (($countLimit >= 49998) or (($songsLinksCount == $count) and ($languagesDataCount == $countLang))) {

                    $countFiles++;

                    $siteMapContent = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
' . $siteMapUrls . '
</urlset>';

                    // Создаем файл
                    $siteMap = new SiteMap();
                    $fileName = 'sitemap_songs_' . $fileNameAdd . '_' . $countFiles;
                    (new \common\components\dump\Dump())->printR($siteMap->realPath());
                    $siteMap->generateFile($siteMapContent, $fileName . '.xml',  $siteMap->realPath() . 'gii/sitemap/songs/');

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
