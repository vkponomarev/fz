<?php

namespace common\components\getParams;

class GetParams
{

    var $artistsIndexLinks; // Все ссылки на первую букву артистов
    var $artistsIndexLinksLetter; // Все ссылки на артистов на кокретную первую букву в виде дата провайдера
    var $artistsIndexLinksLetterName; // Название конкретной Буквы для страницы этой буквы для крошек

    function __construct()
    {

    }

    function byLinksPrevNext()
    {

        return (new GetParamsByLinksPrevNext())->params();

    }

}

