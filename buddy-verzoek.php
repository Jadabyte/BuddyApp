<?php
include_once __DIR__ . "/classes/User.php";

session_start();
if (isset($_POST['submit'])) {
   $reason = $_POST["reden"];
   echo $reason;
   if($_POST[accept]){
       echo "accept";
   } else if($_POST[deny]){
       echo "deny";
   }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddy-verzoek</title>
</head>
<body>
   <h1>U heeft een buddy-verzoek van <?php echo $email ?> gekregen!</h1>
   <form action="" method="post">
   <input type="radio" id="accept" name="accept" value="accept">
   <label for="accept">Accepteren</label><br>
   <input type="radio" id="deny" name="deny" value="deny">
   <label for="deny">Afwijzen</label>
   <br>

    <textarea name="reden" id="reden" cols="30" rows="10" placeholder="Geef eventueel een reden"></textarea><br>
    <input type="submit" name="submit">
   </form>
</body>
</html>