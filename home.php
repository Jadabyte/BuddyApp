<?php

include_once(__DIR__ . "/nav.inc.php");
include_once(__DIR__ . "/classes/Search.php");
include_once(__DIR__ . "/classes/User.php");



if(isset($_POST['search'])){
    $results = null;
    try {
        $search = new Search();
        $search->setSearchItem($_POST['search']); //change this to get, it's easier to put it in the URL
        //var_dump($_POST['search']);
        $results = $search->findUser();
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

if(isset($_POST['sendmail'])){
    try{
        session_start();
        $email = $_SESSION['email']; 
        $subject = 'Buddy Request';
        $message = 'You just got send a buddy request! Go to the app to find out who wants to be your friend!';
        $headers = 'From: mateinimd@gmail.com';
        mail($email,$subject,$message, $headers);
        $succes_mail=  "Mail has been send";
        }catch(\Throwable $th) {
            $error_mail = $th->getMessage();
     }
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" placeholder="Search for people or interests" name="search" class='auto'>
        <input type="submit" value="Search" name="submitSearch">
    </form> 

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

        <script type="text/javascript">
            $(function() {
            
            //autocomplete
            $(".auto").autocomplete({
                source: "autoComplete.php",
                minLength: 1
            });                

        });
    </script>

    <ul>
        <?php if(isset($_POST['search'])) : ?>
            <p><?php echo "Showing results for: " . htmlspecialchars(ucfirst($_POST['search'])); ?></p>
            <?php foreach($results as $result) :?>
                <li><?php echo htmlspecialchars($result['firstname']) . " " . htmlspecialchars($result['lastname']) ?></li>
        <?php endforeach; endif;?>
    </ul>
<br>
<br>
<br>
    <div>

        <p>At the moment there are <?php echo $usersCount ?> registered.</p>

        <p>At the moment there are <?php echo $buddiesCount ?> buddies.</p>

    </div>

    <br>
    <br>

<form method="post"action="">

<?php if(isset($error_mail)): ?>
            <div class="error_mail"><?php echo $error_mail; ?></div>
        <?php endif; ?>

<?php if(isset($succes_mail)) : ?>
            <div class="succes_mail"><?php echo $succes_mail;?></div>
        <?php endif; ?>

<input type="submit" name="sendmail" value="Send Message">


</form>



</body>
</html>
