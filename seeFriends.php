<?php
include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/classes/Db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>See your friends</h1>

    <?php foreach ($friends as $friend): ?>
    <li><?php echo $friend['firstname' . ' ' . 'lastname']?></li>
    <?php endforeach; ?>
</body>
</html>


<!-- Laat een lijst zien van all je buddies
            * haal de namen uit de databank 
            * echo ze in een lijst

            * ("SELECT firstName, lastName FROM friends_tb WHERE id_user = '(de id van de user die zich net heeft aangemeld)')
                        of WHERE firstName_user = "$firstName" && lastName_user = $lastName

            *een foreach loop


 -->