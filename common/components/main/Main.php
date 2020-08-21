<?php

namespace common\components\main;


use Yii;
use yii\web\NotFoundHttpException;




class Main
{

    function __construct(){

    }

    function language(){

        return (new MainLanguage())->language();

    }

    function text($textID, $languageID){

        return (new MainText())->text($textID, $languageID);

    }

    function canonical($url, $mainUrl){

        return (new MainCanonical())->canonical($url, $mainUrl);

    }

    function alternate($url, $mainUrl){

        return (new MainAlternate())->alternate($url, $mainUrl);

    }


}
