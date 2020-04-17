<?php

include_once(__DIR__ . "/nav.inc.php");
include_once(__DIR__ . "/classes/Search.php");
include_once(__DIR__ . "/classes/User.php");


if(isset($_POST['search'])){
    $results = null;
    try {
        $search = new Search();
        $search->setSearchItem($_POST['search']);
        //var_dump($_POST['search']);
        $results = $search->find();
    } catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}

try{      
    $usersCount=User::seeUsers();
    $success = "Dit zijn alle users";
    }
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }

try{      
    $buddiesCount=User::seeBuddies();
    $success = "Dit zijn alle buddies";
    }
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }    

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" placeholder="Search for people or interests" name="search">
        <input type="submit" value="Search" name="submitSearch">
    </form>
    
    <ul>
        <?php if(isset($_POST['search'])) { ?>
            <p><?php echo "Showing results for: " . htmlspecialchars(ucfirst($_POST['search'])); ?></p>
            <?php foreach($results as $result) :?>
            <li><?php echo htmlspecialchars($result['firstname']) . " " . htmlspecialchars($result['lastname']) ?></li>
        <?php endforeach; };?>
    </ul>
<br>
<br>
<br>
    <div>

        <p>At the moment there are <?php echo $usersCount ?> registered.</p>

        <p>At the moment there are <?php echo $buddiesCount ?> buddies.</p>

    </div>
    <button type="submit" name='sendemail'>email</button>

</body>
</html>
