<?php
include_once(__DIR__ . "/Db.php");

$term = $_GET['term'];

$conn = Db::getConnection();

$statement=$conn->prepare("SELECT username FROM users WHERE username LIKE '%$term%'");
$statement->execute();

$arr=$statement->fetchAll(PDO::FETCH_ASSOC);
$data=array();

foreach ($arr as $key=>$val){
    $data[]=$val['username'];

    var_dump($data);
}
    echo json_encode($data);

