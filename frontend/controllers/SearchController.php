<?php

namespace frontend\controllers;

use common\components\albums\AlbumsArtist;
use common\models\MSearch;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use yii\sphinx\Query;
use yii\sphinx\MatchExpression;

class SearchController extends Controller
{


    public function actionSearch($q = null)
    {


        /*$data = Yii::$app->db
            ->createCommand('
            select
            name,
            url
            from
            m_search
            where
            name like "' . $searchWord . '"
            limit 20
            ')
            ->queryAll();*/

        /*$searchWord = '';
        if(strpos($q, 0x20) !== false){
            $tmp = preg_replace('/[^a-zA-ZА-Яа-я0-9 ]/', '', $q);
            $tmp = explode(' ', $tmp);
            foreach ($tmp as $one){
                if ($one <>'') {
                    $searchWord .= '*' . $one . '*';
                }
            }
        } else{
            $searchWord = '*' . $q . '*';
        }

        $searchWord = str_replace("**", "*", $searchWord);
        */
        $searchWord = '*' . $q . '*';
        /*$dataArtists = Yii::$app->db->createCommand('
                    SELECT name, url
                    FROM `m_search_artists`
                    WHERE
                    MATCH(`name`)
                    AGAINST(\'' . $searchWord .'\'  IN BOOLEAN MODE)
                    limit 20;
                    ')
            ->queryAll();*/


        $data = Yii::$app->db->createCommand('
                    SELECT name, url
                    FROM `m_search`
                    WHERE
                    MATCH(`name`)
                    AGAINST("' . $searchWord .'"  IN BOOLEAN MODE)
                    limit 40;
                    ')
            ->queryAll();
        /*if ($dataArtists){
            $data = array_merge($dataArtists, $data);
        }*/
        $out = [];
        foreach ($data as $d) {
            $out[] = [
                'value' => substr($d['name'], 0, 40),
                'url' => $d['url'],
            ];
        }

        echo Json::encode($out);

    }

}
