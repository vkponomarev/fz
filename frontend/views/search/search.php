<?php

/*
define("DB_HOST", "localhost");
define("DB_NAME", ""); //Имя базы
define("DB_USER", ""); //Пользователь
define("DB_PASSWORD", ""); //Пароль
define("PREFIX", ""); //Префикс если нужно
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli->query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");

$searchText = $_GET['term'];
*/

if (!empty($_POST["referal"])) { //Принимаем данные
    //$referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));
    //= $mysqli->query("SELECT * from " . PREFIX . "search WHERE name LIKE '%$referal%'")

    $db_referal = Yii::$app->db
        ->createCommand('
            select
            name
            from
            m_artists
            where 
            name like "%:referal%"
            limit 10
            ', [':referal' => $referal])
        ->queryAll()

    or die('Ошибка №' . __LINE__ . '<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');
    while ($row = $db_referal->fetch_array()) {
        echo "\n<li>" . $row["name"] . "</li>"; //$row["name"] - имя поля таблицы
    }
}



/*
(new \common\components\dump\Dump())->printR($_GET['term']);

//die
//$search = trim(mysqli_real_escape_string($db, $_GET['term']));
$searchText = $_GET['term'];
$search = Yii::$app->db
    ->createCommand('
            select
            name
            from
            m_artists
            where
            name like "%:search%"
            limit 10
            ', [':search' => $searchText])
    ->queryOne();

//$query = "SELECT name FROM m_artists WHERE Name LIKE '%{$search}%' LIMIT 10";
//$res = mysqli_query($db, $query);
$result_search = array();
while($row = $search){
    $result_search[] = array('label' => $row['Name']);
}
return $result_search;

}

if(!empty($_GET['term'])){
    $search = search_autocomplete();
    exit( json_encode($search) );
}

if(!empty($_GET['search'])){
    echo "Поиск по запросу <b>{$_GET['search']}</b>...";
}*/