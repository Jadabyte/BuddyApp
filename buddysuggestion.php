<?php 
include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/nav.inc.php");

session_start();
if(isset($_SESSION["user"])){
    $id = $_SESSION['user'];
    $user = new User();
    $user->setUserId($id);

    $interests = $user->fetchUser();
   
    $user->setKlas($interests["klas"]);
    $user->setMuziek($interests["muziek"]);
    $user->setFilm($interests["film"]);
    $user->setHobby($interests["hobby"]);
    $user->setFavoriet($interests["favoriet"]);

    $match = $user->findMatch();
 
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
    
<h1>U heeft een match met de volgende personen</h1>

<ul>
<?php 

foreach ($match as $key => $value):?>
<li>
    <?php 
        $matchInfo = $user->getMatchInfo($value["userId"]);

        $fnMatch = $matchInfo["firstname"];
        $lnMatch = $matchInfo["lastname"];
        echo $fnMatch . " " . $lnMatch
    ?>
</li>
<?php endforeach;?>
</ul>
        
        
    
</body>
</html>