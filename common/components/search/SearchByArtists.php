<?php

namespace common\components\search;

use Yii;
use yii\web\NotFoundHttpException;

class SearchByArtists
{

    public function search($id)
    {

        //global $db;
        $search = trim(mysqli_real_escape_string($db, $_GET['term']));
        $query = "SELECT Name FROM city WHERE Name LIKE '%{$search}%' LIMIT 10";
        $res = mysqli_query($db, $query);
        $result_search = array();
        while($row = mysqli_fetch_assoc($res)){
            $result_search[] = array('label' => $row['Name']);
        }
        return $result_search;

    }

}

if(!empty($_GET['term'])){
    $search = search_autocomplete();
    exit( json_encode($search) );
}

if(!empty($_GET['search'])){
    echo "Поиск по запросу <b>{$_GET['search']}</b>...";
}
