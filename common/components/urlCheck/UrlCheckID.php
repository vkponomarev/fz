<?php

namespace common\components\urlCheck;


use yii\web\NotFoundHttpException;


class UrlCheckID
{


    function id($url)
    {

        if (!preg_match('/(?<=-)[0-9]+$/', $url, $id)) {

            throw new NotFoundHttpException('404');

        }

        $id = (int)$id['0'];

        return $id;

    }

}
