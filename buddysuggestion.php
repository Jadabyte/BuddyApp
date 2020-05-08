<?php 
include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/nav.inc.php");

session_start();
if(isset($_SESSION["user"])){
    $email = $_SESSION['user'];
    $userId = User::getUserId($email);
    $buddys = User::findOthers($userId);
    var_dump($buddys);
    
} else{
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>