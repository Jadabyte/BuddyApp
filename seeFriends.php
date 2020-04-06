<?php

include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/classes/Db.php");


      try{
         
      $friends=User::pullUpFriends();
      $success = "Je hebt nog geen buddies!";
      }
      catch (\Throwable $th) {
          $error = $th->getMessage();
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
</head>
<body>

<br>
<form action="home.php">
         <button type="submit">Go Back</button>
      </form>
<br>

<br>

    <h1>Here are all the buddies</h1>

    <br>

     <?php if(isset($error)): ?>
            <div class="error" style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)) : ?>
            <div class="success"><?php echo $success;?></div>
        <?php endif; ?>

        <br>

    <?php foreach ($friends as $friend) : ?>

        <li class="username"> <?php echo $friend['name']?></li>
      
    <?php endforeach; ?>

        
</body>
</html>

