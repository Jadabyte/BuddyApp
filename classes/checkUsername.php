<?php

spl_autoload_register();


if (isset($_POST["user_name"])){
    $conn = Db::getConnection();

    $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $statement->bindValue(":username", $_POST["user_name"]);
    $statement->execute();

    $result = $statement->rowCount();

    echo $result;
}
