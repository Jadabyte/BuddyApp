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
    <title>IMD Buddy App</title>
</head>
<body>
    <main>
        <?php if(isset($error)): ?>
            <div class="error" style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)) : ?>
            <div class="success"><?php echo $success;?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div>
                <label for="Firstname">Firstname</label>
                <input type="text" id="Firstname" name="firstname">
            </div>

            <div>
                <label for="Lastname">Lastname</label>
                <input type="text" id="Lastname" name="lastname">
            </div>

            <div>
                <label for="Username">Username</label>
                <input type="text" id="Username" name="username">
            </div>

            <div>
                <label for="Email">Email</label>
                <input type="text" id="Email" name="email">
            </div>

            <div>
                <label for="Password">Password</label>
                <input type="password" id="Password" name="password">
            </div>

            <div>
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </main>
</body>
</html>