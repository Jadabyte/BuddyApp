<?php

include_once(__DIR__ . "/Db.php");
include_once(__DIR__ . "/User.php");

class Mail{

public function SendMail(){

        $conn = Db::getConnection();

        session_start();
        $reg_email = $_SESSION['email'];
        $statement =$conn->prepare("SELECT email FROM users WHERE email = '$reg_email'");
        $result = $statement->execute();

        return $result;
    }
}
?>