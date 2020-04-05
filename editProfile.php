<?php
    include_once(__DIR__ . "/classes/User.php");

    session_start();
    $email = $_SESSION['email'];

    if(isset($_POST['buddy'])){
        try {
            $user = new User();
            $user->setBuddy($_POST['buddy']);
            $user->setEmail($email);
            $user->buddyChoice();
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <p><?php if(isset($error)){ echo $error; }?></p>
    <form action="" method="post">
        <div>
            <input type="radio" id="findBuddy" name="buddy" value="findBuddy">
            <label for="findBuddy">I'm looking for a buddy</label>
        </div>
        <div>
            <input type="radio" id="beBuddy" name="buddy" value="beBuddy">
            <label for="beBuddy">I would like to be a buddy</label>
        </div>
        <input type="submit" name="submitChanges" value="Submit Changes">
    </form>
</body>
</html>