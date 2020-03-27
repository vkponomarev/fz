<?php

namespace common\components\index;

use Yii;
use yii\data\SqlDataProvider;

class ArtistsIndexLinksLetter
{


    public function artistsIndexLinksLetter($firstLetterId, $pageSize)
    {
        //echo $languageId;

        /*$artistsLinks = Yii::$app->db
            ->createCommand('
            select
            id,
            name,
            url
            from
            m_artists
            where first_letter = ' . $firstLetterId . '
            ')
            ->queryAll();*/

        $count = Yii::$app->db->createCommand('
            SELECT 
            COUNT(*) 
            FROM 
            m_artists
            where
            first_letter=:first_letter
            ', [':first_letter' => $firstLetterId])->queryScalar();

        $artistsIndexLinksLetter = new SqlDataProvider([
            'sql' => '
            SELECT 
            name,
            url
            FROM 
            m_artists 
            WHERE first_letter=:first_letter',
            'params' => [':first_letter' => $firstLetterId],
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

        //echo '<pre>';
        //var_dump($texts);
        //print_r($provider);
        //echo '</pre>';
        //return $models = $provider->getModels();

        //return $artistsLinks;

        return [

            'artistsIndexLinksLetter' => $artistsIndexLinksLetter,
            'itemsCount' => $count,

        ];
    }
/**

$count = Yii::$app->db->createCommand('
SELECT COUNT(*) FROM post WHERE status=:status
', [':status' => 1])->queryScalar();


$provider = new SqlDataProvider([
'sql' => 'SELECT * FROM post WHERE status=:status',
'params' => [':status' => 1],
'totalCount' => $count,
'pagination' => [
'pageSize' => 10,
],
'sort' => [
'attributes' => [
'title',
'view_count',
'created_at',
],
],
]);

// возвращает массив данных
$models = $provider->getModels();
*/
}