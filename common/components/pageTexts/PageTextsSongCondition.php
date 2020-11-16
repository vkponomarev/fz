<?php

namespace common\components\pageTexts;

use common\components\main\Main;
use Yii;

class PageTextsSongCondition

{

    public function condition($languageID, $songData, $translationByLanguage)
    {
        // Нам нужно выводить определенный сео текст для страницы конкретной песни в зависимости от наличия или
        // отсутствия определенных данных этой песни,
        // например отсутствует текст песни выводим сео текста где не указано что есть текст песни.
        // отсутствует ссылка на ютуб убираем Слушать.
        // отсутствуют переводы песни убираем перевод
        // есть текст песни но нет переводов
        // есть текст песни но этот язык оригинальный то есть нет перевода на этот язык.

        /**
         * Текст песни
         * Перевод песни
         * Ссылка на ютуб
         * Оригинальный текст песни
         */

        // Yii::$app->params['language']['current']['id']
        // $songData['text']
        // $songData['url_youtube']
        // $translationByLanguage['languages_id']
        // $translationByLanguage['origin']
        // $translationByLanguage['text']

        $main = new Main();

        // Если есть текст песни есть перевод и есть ссылка на ютуб и этот язык не оригинальный
        if ($songData['text'] && !$translationByLanguage['origin'] && $songData['url_youtube']) {

            $textID = '58'; // ID из таблицы pages
            Yii::$app->params['text'] = $main->text($textID, $languageID);

        }

        // Если есть текст песни есть перевод и есть ссылка на ютуб и этот язык оригинальный
        if ($songData['text'] && $translationByLanguage['origin'] && $songData['url_youtube']) {

            $textID = '73'; // ID из таблицы pages
            Yii::$app->params['text'] = $main->text($textID, $languageID);

        }


        // Если есть текст песни нет перевода и есть ссылка на ютуб
        if ($songData['text'] && !$translationByLanguage && $songData['url_youtube']) {

            $textID = '74'; // ID из таблицы pages
            Yii::$app->params['text'] = $main->text($textID, $languageID);

        }

        // Если есть текст песни нет перевода и нет ссылки на ютуб
        if ($songData['text'] && !$translationByLanguage && !$songData['url_youtube']) {

            $textID = '75'; // ID из таблицы pages
            Yii::$app->params['text'] = $main->text($textID, $languageID);

        }

        // Если нет текста песни но есть ссылка на ютуб
        if (!$songData['text'] && $songData['url_youtube']) {

            $textID = '76'; // ID из таблицы pages
            Yii::$app->params['text'] = $main->text($textID, $languageID);

        }

        // Если нет текста песни и нет ссылки на ютуб
        if (!$songData['text'] && !$songData['url_youtube']) {

            $textID = '77'; // ID из таблицы pages
            Yii::$app->params['text'] = $main->text($textID, $languageID);

        }

        // Если ни одно из условий не сработало
        if (!isset(Yii::$app->params['text'])) {
            $textID = '77';
            Yii::$app->params['text'] = $main->text($textID, $languageID);
        }



    }

}