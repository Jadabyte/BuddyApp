<?php
include_once(__DIR__ . "/classes/Db.php");

if (isset($_GET['term'])){
    $return_arr = array();

    try {
        $conn = Db::getConnection();
        
        $statement = $conn->prepare('SELECT firstname, lastname FROM users WHERE firstname LIKE :term');
        
        $statement->execute(array('term' => '%'.$_GET['term'].'%'));
        
        while($row = $statement->fetch()) {
            $return_arr[] =  $row['firstname'];
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    echo json_encode($return_arr);
}

