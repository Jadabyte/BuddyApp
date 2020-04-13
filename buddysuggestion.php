<?php 

/*include_once(__DIR__ . "/classes/User.php");

$conn = Db::getConnection();
    
    if ($_SESSION["User.php"]) {
        $user_id = $_SESSION["user_id"];
        $query = "SELECT * ";
        $query .= "FROM friends ";
        $query .= "WHERE ";
        $query .= "user_id OR friend_id = '{$user_id}' ";
        $result = mysqli_query($connection, $query);
        $result_set = mysqli_fetch_assoc($result);
        print_r($result_set);
    }


$query = "SELECT * ";
$query .= "FROM users ";

/*

*/


?>