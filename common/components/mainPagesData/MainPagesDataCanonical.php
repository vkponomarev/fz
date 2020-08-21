<?php

namespace common\components\mainPagesData;



use Yii;

class MainPagesDataCanonical
{

    function canonical($givenUrl, $mainUrl){


        if ($mainUrl){

            if (!$givenUrl){

                Yii::$app->params['canonical'] = \yii\helpers\Url::home(true) . Yii::$app->language . '/' . $mainUrl . '/';

            }else{

                Yii::$app->params['canonical'] = \yii\helpers\Url::home(true) . Yii::$app->language . '/' . $mainUrl . '/' . $givenUrl . '/';

            }

        }else{

            Yii::$app->params['canonical'] = \yii\helpers\Url::home(true) . Yii::$app->language . '/';

        }


    }

}

