<?php

namespace common\components\songs;

use Yii;
use yii\web\NotFoundHttpException;

class SongsAddFeaturing
{

    public function songs($songs, $featuring)
    {

        foreach ($featuring as $value){

            $key = array_search($value['songID'], array_column($songs, 'id'));

            if ($key != null){

                $songs[$key]['featuring'][] = [
                    'name' => $value['name'],
                    'url' => $value['url'],
                        ];
            }

        }
        return $songs;
    }

}

