<?php
include_once(__DIR__ . "/classes/User.php");
include_once(__DIR__ . "/interface/iProfile.php");

try {
    $user1 = new User();
} catch (\Throwable $th) {
    $error = $th->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <h1>Profile settings</h1>
    <div class="avatar"></div>
    <input type="text" name="desc" id="desc">
    <input type="email" name="email" id="email">
    <input type="password" name="password" id="password">

    <?php if (isset($error)) : ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php
    echo $user;
    ?>


    <?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    ?>
</body>

</html>

<?php
//1
//avatar foto uploaden en aanpassen
/*- opladen van foto / avatar
          - Beperk de bestandstypes en bestandsgrootte
          - Geef gebruiksvriendelijke feedback als de update mislukt, maar ook als                     
             die lukt
- Beschrijving / korte profieltekst (emoji’s bewaren moet mogelijk zijn)
- Wachtwoord wijzigen lukt
          - Wat is een veilige manier om dit te doen? Overleg met je team.
- Email adres wijzigen
          - Hoe kan je dit veilig toelaten? (wat als je even van je laptop weg bent 
            en iemand je wachtwoord wijzigt?) Idem voor wachtwoord wijzigen.
- Zorg dat je hier aantoont dat je hebt nagedacht over een veilige procedure 
 */


//2
//beschrijving profielfoto's, emojis mogelijk om te bewaren
//ww wijzigen lukt
/* - opladen van foto / avatar
          - Beperk de bestandstypes en bestandsgrootte
          - Geef gebruiksvriendelijke feedback als de update mislukt, maar ook als                     
             die lukt
- Beschrijving / korte profieltekst (emoji’s bewaren moet mogelijk zijn)
- Wachtwoord wijzigen lukt
          - Wat is een veilige manier om dit te doen? Overleg met je team.
- Email adres wijzigen
          - Hoe kan je dit veilig toelaten? (wat als je even van je laptop weg bent 
            en iemand je wachtwoord wijzigt?) Idem voor wachtwoord wijzigen.
- Zorg dat je hier aantoont dat je hebt nagedacht over een veilige procedure 
*/


//3
//email adres wijzigen


?>