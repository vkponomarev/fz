<?php

namespace common\components\artists;

use Yii;
use yii\data\SqlDataProvider;
use yii\web\NotFoundHttpException;

class ArtistsByFirstLetter
{

    public function artists($firstLetterByArtist, $pageSize)
    {

        $count = Yii::$app->db->createCommand('
            SELECT 
            COUNT(*) 
            FROM 
            m_artists
            where
            first_letter=:first_letter
            and 
            active = 1
            ', [':first_letter' => $firstLetterByArtist['id']])->queryScalar();

        $artists = new SqlDataProvider([
            'sql' => '
            SELECT 
            name,
            url
            FROM 
            m_artists 
            WHERE first_letter=:first_letter
            and 
            active = 1
            ',
            'params' => [':first_letter' => $firstLetterByArtist['id']],
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
            //'sort' => [
            //    'attributes' => [
            //        '',
            //'view_count',
            //'created_at',
            //   ],
            //],
        ]);


        //return $artistsLinks;

        return [

            'artists' => $artists,
            'itemsCount' => $count,

        ];
    }


}

