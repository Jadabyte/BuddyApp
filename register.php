<?php
    include_once(__DIR__ . "/classes/User.php");
    

    if(!empty($_POST)){
        try{
            $user = new User();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setUsername($_POST['username']);

            $user->checkDuplicate();
            $user->submit();
            $success = "Account Created!";
            header('Location: index.php');
        }
        catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<body>
    <main>
        <h2>Register for the IMD Buddy App</h2>
        <?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)) : ?>
            <div class="success"><?php echo $success;?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div>
                <label for="Firstname"></label>
                <input type="text" id="Firstname" name="firstname" placeholder="Firstname">
            </div>

            <div>
                <label for="Lastname"></label>
                <input type="text" id="Lastname" name="lastname" placeholder="Lastname">
            </div>

            <div>
                <label for="Username"></label>
                <input type="text" id="Username" name="username" placeholder="Username">
            </div>

            <div>
                <label for="Email"></label>
                <input type="text" id="Email" name="email" placeholder="Email">
            </div>

            <div>
                <label for="Password"></label>
                <input type="password" id="Password" name="password" placeholder="Password">
            </div>

            <div>
                <input id="submit" type="submit" value="Sign Up">
            </div>
        </form>
    </main>
</body>
</html>