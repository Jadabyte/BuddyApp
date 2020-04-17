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

<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing  with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>