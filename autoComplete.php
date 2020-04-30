<?php
//include("/xampp/htdocs/GitHub/BuddyApp/classes/Db.php");
include_once(__DIR__ . "/classes/Db.php");

if (isset($_GET['term'])){
    $return_arr = array();

    try {
        $conn = Db::getConnection();
        
        $stmt = $conn->prepare('SELECT firstname, lastname FROM users WHERE firstname LIKE :term');
        
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        
        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['firstname'];

            //$return_arr[] =  $row['firstname'] . " " .  $row['lastname'];
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}

