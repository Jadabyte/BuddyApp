<?php
//check.php
include_once(__DIR__ . "/classes/Db.php");
if (isset($_POST["user_name"])) {
    $username= $_POST["user_name"];

    $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $statement->bindValue(":username", $username);
    $result = $statement->execute();
    echo rowCount($result);
    
}


/*
<?php
//check.php
$connect = mysqli_connect("localhost", "root", "root", "BuddyApp");
if (isset($_POST["user_name"])) {
    $username = mysqli_real_escape_string($connect, $_POST["user_name"]);
    $query = "SELECT * FROM users WHERE username = '" . $username . "'";
    $result = mysqli_query($connect, $query);
    echo mysqli_num_rows($result);
}

*/