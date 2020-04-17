<?php
include_once (__DIR__ . "/classes/User.php/");

session_start();
if(isset($_SESSION["user"])){
   $email = $_SESSION["user"];
   
   
/*
   $perfectMatch = $person->findPerfectMatch($info);
   $klasMatch = $person->findKlasMatch($info);
   $muziekMatch = $person->findMuziekMatch($info);
   $filmMatch = $person->findFilmMatch($info);
   $hobbyMatch = $person->findHobbyMatch($info);
   $favorietMatch = $person->findFavorietMatch($info);*/
} else{
    header("Location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welkom <?php echo $email ?>

   
</body>
</html>
