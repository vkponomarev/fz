<?php

namespace common\models\components;



use Yii;
use yii\web\NotFoundHttpException;

class FlowPageUrl
{

    public function pageUrlCheck($pageId)
    {

       // if () {
//
       //     throw new NotFoundHttpException('404');


      //  }
    }


    public function pageUrlSeparator($pageUrl)
    {

        if (!preg_match('/(?<=-)[0-9]+$/', $pageUrl, $pageId)){

            throw new NotFoundHttpException('404');

        }

        //print_r($pageId);
        //$pageId = 'e00005';
        $pageId = (int) $pageId['0'];
        //print_r($pageId);

        return $pageId;

    }








}

