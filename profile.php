<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Posts.php");

    $posts = Posts::getAllPosts();

    if(isset($_GET['user'])){
        $user = new User;
        $user->setUserId($_GET['user']);
        $userCreds = $user->fetchUser();
        $userFriends = $user->fetchFriend();
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
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
    <ul class="posts">
        <?php foreach($posts as $post): ?>
            <li> <?php echo $post['text']; ?></li>
        <?php endforeach; ?>
    </ul>

    <div>
        <input type="text" id="postContent" placeholder="Write a new post">
        <a href="#" id="btnAddPost">Add</a>
    </div>
    
    <?php if($userFriends == true) : ?>
        <div>
            <p><?php echo htmlspecialchars($userCreds['firstname'] . " is now friends with:" )?></p>
            <h4><?php echo htmlspecialchars($userFriends['firstname'] . " " . $userFriends['lastname'])?></h4>
        </div>
    <?php endif; ?>
    <script src="js/post.js"></script>
</body>
</html>