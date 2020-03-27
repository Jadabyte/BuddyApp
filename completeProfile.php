<?php

if (isset ($_POST['insert'])){
  
  $conn=new PDO("mysql:host=localhost;dbname=code3_buddyapp", "root", "root");

  $klas=$_POST['klas'];
  $muziek=$_POST['muziek'];
  $film=$_POST['film'];
  $hobby=$_POST['hobby'];
  $favoriet=$_POST['favoriet'];

  //var_dump($klas); var_dump($muziek); var_dump($filmsmaak); var_dump($hobby);var_dump($favoriet);

  $sql=$conn-> prepare("INSERT INTO interesses (klas, muziek, film, hobby, favoriet) VALUES ( '$klas', '$muziek', '$film', '$hobby', '$favoriet')");

  $result=$sql->execute();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddy App</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<h1>Vervolledig Je Account</h1>
<h2>Door een paar vragen te beantwoorden</h2>

<div id="form">
    <form action="" method="post">
      <label>In welke klas zit je?</label><br>
      <select name="klas">
        <option disabled selected>--Maak een keuze--</option>
        <option value="1IMDA">1IMDA</option>
        <option value="1IMDB">1IMDB</option>
        <option value="1IMDC">1IMDC</option>
        <option value="2IMDA">2IMDA</option>
        <option value="2IMDB">2IMDB</option>
        <option value="3IMDA">3IMDA</option>
      </select>
      <br>
      <br>

      <label>Van wat voor soort muziek houdt je?</label><br>
      <select name="muziek">
        <option disabled selected>--Maak een keuze--</option>
        <option value="rap">Rap</option>
        <option value="pop">Pop</option>
        <option value="jazz">Jazz</option>
        <option value="rock">Rock</option>
        <option value="schlager">Schlager😍</option>
      </select>

      <br>
      <br>

      <label>Van wat voor soort films houdt je?</label><br>
      <select name="film">
        <option disabled selected>--Maak een keuze--</option>
        <option value="horror">Horror</option>
        <option value="comic">Komedie</option>
        <option value="actie">Actie</option>
        <option value="avonturen">Avonturen</option>
        <option value="romcom">RomCom</option>
        <option value="science fiction">Science Fiction</option>
        <option value="drama">Drama</option>
      </select>

      <br>
      <br>

      <label>Wat doet je in uw vrije tijd?</label><br>
      <select name="hobby">
        <option disabled selected>--Maak een keuze--</option>
        <option value="sporten">Sporten</option>
        <option value="netflixen">Netflixen</option>
        <option value="uitgaan">Uitgaan</option>
        <option value="gamen">Gamen</option>
        <option value="coderen">Coderen</option>
        <option value="niksen">Niksen</option>
      </select>
      <br>
      <br>

      <h4>Last but not least🤣</h4>
        <label>Wie zijn de beste?</label><br>
        <select name="favoriet" >
          <option disabled selected>--Maak een keuze--</option>
          <option value="designer">Designer</option>
          <option value="developer">Developer</option>
        </select>
        <br>
        <br>

      <button type="submit" name ="insert">Vervolledig</button>

    </form>
  </div>
</body>
</html>
