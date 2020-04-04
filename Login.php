<?php

//Om in te loggen:
    // Email: leandernelissen@gmail.com
    // Wachtwoord: hhh


    include_once(__DIR__ . "/classes/User.php");


if (!empty($_POST)) {// Wanneer form is gesubmit
    // Kijken of alle velden zijn ingevuld
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        // Kijken of email en wachtwoord overeenkomen met database
        if (canLogin($email, $password)) {
            session_start();
            $_SESSION["user"] = $email;

            header('Location: index.php');
        } else {
            // user+pass don't match
            // show error
            $error = "⚠️ Uw email of wachtwoord is onjuist ⚠️";
        }

    } else {
        $error = "⚠️ Alle velden moeten ingevuld zijn ⚠️";
    }

}
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
    

    <div id="login">
    <h1>Welkom bij de IMD Buddy App</h1>
        <form action="" method="post">
                    <h2>Sign In</h2>

                    <?php if (isset($error)): ?>
                    <div class="error">
                        <p>
                            <?php echo $error; ?>
                        </p>
                    </div>
                    <?php endif;?>

                    <div class="input">
                        <label for="Email">Email</label>
                        <input type="text" id="Email" name="email">
                    </div>
                    <div class="input">
                        <label for="Password">Password</label>
                        <input type="password" id="Password" name="password">
                    </div>

                    <div class="submit">
                        <input type="submit" value="Sign in" class="btn btn--primary">
                    </div>
        </form>
        <p></p>
    </div>
</body>
</html>

<!--
    [feature 2] inloggen kan op een veilige manier
              *  toon een foutmelding indien inloggen niet gelukt is (zie screenshot)
              *  valideer al wat kan mislopen in dit formulier via PHP
              *  uitloggen is mogelijk
-->
