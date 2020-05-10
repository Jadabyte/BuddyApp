<?php
include_once(__DIR__ . "/nav.inc.php");
include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/classes/Db.php");


      try{
         
      $friends=User::pullUpFriends();
     // $success = "Hier zijn je buddies!";
      }
      catch (\Throwable $th) {
          $error = $th->getMessage();
      }


    //session_start();
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

        $klasMatch = $user->findKlasMatch();
        $muziekMatch = $user->findMuziekMatch();
        $filmMatch = $user->findFilmMatch();
        $hobbyMatch = $user->findHobbyMatch();
        $favoriteMatch = $user->findFavoriteMatch();
    
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/seeFriends.css">
</head>
<body>

<h1>U heeft een match met de volgende personen</h1>

    <div id="klas">
        <h2>Op basis van uw klas:</h2>
        <ul>
        <?php 

        foreach ($klasMatch as $key => $value):?>
        <li>
            <?php 
                $matchInfo = $user->getMatchInfo($value["userId"]);

                $fnMatch = $matchInfo["firstname"];
                $lnMatch = $matchInfo["lastname"];
                echo $fnMatch . " " . $lnMatch;
            ?>
        </li>
        <?php endforeach;?>

        </ul>
    </div>

    <div id="muziek">
        <h2>Op basis van uw muzieksmaak:</h2>
        <ul>
        <?php 

        foreach ($muziekMatch as $key => $value):?>
        <li>
            <?php 
                $matchInfo = $user->getMatchInfo($value["userId"]);

                $fnMatch = $matchInfo["firstname"];
                $lnMatch = $matchInfo["lastname"];
                echo $fnMatch . " " . $lnMatch;
            ?>
        </li>
        <?php endforeach;?>

        </ul>
    </div>

    <div id="film">
        <h2>Op basis van uw filmsmaak:</h2>
        <ul>
        <?php 

        foreach ($filmMatch as $key => $value):?>
        <li>
            <?php 
                $matchInfo = $user->getMatchInfo($value["userId"]);

                $fnMatch = $matchInfo["firstname"];
                $lnMatch = $matchInfo["lastname"];
                echo $fnMatch . " " . $lnMatch;
            ?>
        </li>
        <?php endforeach;?>

        </ul>
    </div>

    <div id="hobby">
        <h2>Op basis van uw hobby:</h2>
        <ul>
        <?php 

        foreach ($hobbyMatch as $key => $value):?>
        <li>
            <?php 
                $matchInfo = $user->getMatchInfo($value["userId"]);

                $fnMatch = $matchInfo["firstname"];
                $lnMatch = $matchInfo["lastname"];
                echo $fnMatch . " " . $lnMatch;
            ?>
        </li>
        <?php endforeach;?>

        </ul>
    </div>

    <div id="favoriet">
        <h2>Op basis van uw keuze tussen designer en developer:</h2>
        <ul>
        <?php 

        foreach ($favoriteMatch as $key => $value):?>
        <li>
            <?php 
                $matchInfo = $user->getMatchInfo($value["userId"]);

                $fnMatch = $matchInfo["firstname"];
                $lnMatch = $matchInfo["lastname"];
                echo $fnMatch . " " . $lnMatch;
            ?>
        </li>
        <?php endforeach;?>

        </ul>
    </div>
  
<br>

    <h1 id="h1">Here are all the buddies</h1>

    <br>

     <?php if(isset($error)): ?>
            <div class="error" style="color: red;"><?php echo htmlspecialchars ($error); ?></div>
        <?php endif; ?>

        <br>

    <?php foreach ($friends as $friend) : ?>

        <div class="username">
            
            <?php echo htmlspecialchars ($friend['username'])?>
        </div>

        <br>
      
    <?php endforeach; ?>

        
</body>
</html>

