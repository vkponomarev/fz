<?php

namespace common\components\main;



use Yii;

class MainCanonical
{

    function canonical($url, $mainUrl){


        if ($mainUrl){

            if (!$url){

                $canonical = \yii\helpers\Url::home(true) . Yii::$app->language . '/' . $mainUrl . '/';

            }else{

                $canonical = \yii\helpers\Url::home(true) . Yii::$app->language . '/' . $mainUrl . '/' . $url . '/';

            }

        }else{

            $canonical = \yii\helpers\Url::home(true) . Yii::$app->language . '/';

        }

        return $canonical;

    }

}

