<?php
session_start();
include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/classes/Db.php");


if(!empty($_POST)){
    try{
        $user = new User();
        $user->setKlas($_POST['klas']);
        $user->setMuziek($_POST['muziek']);
        $user->setFilm($_POST['film']);
        $user->setHobby($_POST['hobby']);
        $user->setFavoriet($_POST['favoriet']);
        $user->setUserId($_SESSION['userId']);

        $user->submitIntresses();;
        $success = "Interesses zijn toegevoegd!";

        header('Location: home.php');

    }
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddy App</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/completeProfile.css">

</head>
<body>

<div class="main">
<h1 id="h1">Vervolledig Je Account</h1>
<h2>Door een paar vragen te beantwoorden</h2>

<br>
<?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)) : ?>
            <div class="success"><?php echo $success;?></div>
        <?php endif; ?>
<br>
<br>


<div id="form">
    <form action="" method="post">
      <label>In welke klas zit je?</label><br>
      <select name="klas">
        <option class="option"  value="default">--Maak een keuze--</option>
        <option  class="option" value="1IMDA">1IMDA</option>
        <option  class="option" value="1IMDB">1IMDB</option>
        <option  class="option" value="1IMDC">1IMDC</option>
        <option  class="option" value="2IMDA">2IMDA</option>
        <option  class="option" value="2IMDB">2IMDB</option>
        <option  class="option" value="3IMDA">3IMDA</option>
      </select>
      <br>
      <br>

      <label>Van wat voor soort muziek houdt je?</label><br>
      <select name="muziek">
        <option class="option" value="default">--Maak een keuze--</option>
        <option class="option" value="rap">Rap</option>
        <option class="option" value="pop">Pop</option>
        <option class="option" value="jazz">Jazz</option>
        <option class="option" value="rock">Rock</option>
        <option class="option" value="schlager">Schlager</option>
      </select>

      <br>
      <br>

      <label>Van wat voor soort films houdt je?</label><br>
      <select name="film">
        <option class="option"  value="default">--Maak een keuze--</option>
        <option class="option" value="horror">Horror</option>
        <option class="option" value="comic">Komedie</option>
        <option class="option" value="actie">Actie</option>
        <option class="option" value="avonturen">Avonturen</option>
        <option class="option" value="romcom">RomCom</option>
        <option class="option" value="science fiction">Science Fiction</option>
        <option class="option" value="drama">Drama</option>
      </select>

      <br>
      <br>

      <label>Wat doet je in uw vrije tijd?</label><br>
      <select name="hobby">
        <option class="option"  value="default">--Maak een keuze--</option>
        <option class="option" value="sporten">Sporten</option>
        <option class="option" value="netflixen">Netflixen</option>
        <option class="option" value="uitgaan">Uitgaan</option>
        <option class="option"value="gamen">Gamen</option>
        <option class="option" value="coderen">Coderen</option>
        <option class="optio value="niksen">Niksen</option>
      </select>
      <br>
      <br>

      <h3 class="h3">Last but not least</h4>
        <label>Wie zijn de beste?</label><br>
        <select name="favoriet" >
          <option class="option"  value="default">--Maak een keuze--</option>
          <option class="option" value="designer">Designer</option>
          <option class="option" value="developer">Developer</option>
        </select>
        <br>
        <br>

      <button type="submit" id="submit" name ="insert">Vervolledig</button>

    </form>
  </div>
  </div>
</body>
</html>