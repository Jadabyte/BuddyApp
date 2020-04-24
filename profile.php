<?php
    include_once(__DIR__ . "/classes/User.php");

    session_start();
    //$_SESSION['email'] = 't.j@student.thomasmore.be';
    $email = $_SESSION['email'];

    $user = new User;
    $user->setEmail($email);
    $userCreds = $user->fetchUser();
    $userFriends = $user->fetchFriend();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($userCreds['firstname'] . " " . $userCreds['lastname']); ?></h1>
    <p>Username: <?php echo htmlspecialchars($userCreds['username']) ?></p>

    <div>
        <h4>Extra Information:</h4>
        <ul>
            <li>Class: <?php echo htmlspecialchars($userCreds['klas'])?></li>
            <li>Favourite Music: <?php echo htmlspecialchars($userCreds['muziek'])?></li>
            <li>Favourite Movie: <?php echo htmlspecialchars($userCreds['film'])?></li>
            <li>Favourite Hobby: <?php echo htmlspecialchars($userCreds['hobby'])?></li>
            <li>IMD Preference: <?php echo htmlspecialchars($userCreds['favoriet'])?></li>
        </ul>
    </div>

    <div>
        <p><?php echo htmlspecialchars($userCreds['firstname'] . " is now friends with:" )?></p>
        <h4><?php echo htmlspecialchars($userFriends['firstname'] . " " . $userFriends['lastname'])?></h4>
    </div>
</body>
</html>