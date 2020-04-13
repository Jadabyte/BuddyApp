<?php 

$naam = "Leander"; 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddy-verzoek</title>
</head>
<body>
   <h1>U heeft een buddy-verzoek van <?php echo $naam ?> gekregen!</h1> 
   <form action="">
   <input type="radio" id="accept" name="accept" value="accept">
   <label for="accept">Accepteren</label><br>
   <input type="radio" id="denie" name="denie" value="denie">
   <label for="denie">Afwijzen</label>
   <br>

    <textarea name="reden" id="reden" cols="30" rows="10" placeholder="Geef eventueel een reden"></textarea>
   
   </form>
</body>
</html>