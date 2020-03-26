<?php
    include_once(__DIR__ . "/classes/User.php");

    if(!empty($_POST)){
        try{
            $user = new User()
            $user->setEmail($_POST['email']);
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
                <label for="Email">Email</label>
                <input type="text" id="Email" name="email">
            </div>

            <div>
                <label for="Password">Password</label>
                <input type="text" id="Password" name="password">
            </div>

            <div>
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </main>
</body>
</html>