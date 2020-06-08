<?php
namespace frontend\controllers;

use common\components\albums\Albums;
use common\components\albums\AlbumsArtist;
use common\components\artist\Artist;
use common\components\artists\Artists;
use common\components\breadcrumbs\Breadcrumbs;
use common\components\firstLetter\FirstLetter;
use common\components\mainPagesData\MainPagesData;
use common\components\pageTexts\PageTexts;
use common\components\song\Song;
use common\components\songs\Songs;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;


/**
 * Main controller
 * pageText($currentPage,$pageUsingKeys)
 *
 *
 *
 *
 */
class SearchController extends Controller
{


    public function actionIndex()
    {

        $mainPagesData = new MainPagesData('2',false, 0, 'artists');



        return $this->render('search', [



        ]);

    }
    public function actionSearch($q = null) {


        //(new \common\components\dump\Dump())->printR(weewf);
        //(new \common\components\dump\Dump())->printR(22);
       /* $query = new Query;

        $query->select('name')
            ->from('m_artists')
            ->where('name LIKE "%' . $q .'%"')
            ->orderBy('name')
            ->limit('10');;
        $command = $query->createCommand();
        $data = $command->queryAll();*/

         $data = Yii::$app->db
            ->createCommand('
            select
            name,
            url
            from
            m_artists
            where 
            name like "%' . $q .  '%"
            order by name
            limit 20
            ', [':referal' => $q])
            ->queryAll();

       $out = [];
        foreach ($data as $d) {
            $out[] = [
                'value' => $d['name'],
                'url' => $d['url'],
                ];
        }

        //$out[] = ['value' => '2pac'];
        //$out[] = ['value' => 'methodman'];
        //(new \common\components\dump\Dump())->printR($out[]);

        echo Json::encode($out);

    }


}
