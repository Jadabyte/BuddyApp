<?php
    include_once(__DIR__ . "/nav.inc.php");
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Posts.php");

    $posts = Posts::getAllPosts($_SESSION['user']);

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
    <link rel="stylesheet" href="css/profile.css">
    <!--<meta http-equiv="refresh" content="5"/> make sure to delete this-->
    <title>Profile</title>
</head>
<body>
    <header data-id="<?php echo($_SESSION['user']); ?>" id="user">
        <h1 id="name" class="name"><?php echo htmlspecialchars($userCreds['firstname'] . " " . $userCreds['lastname']); ?></h1>
        <p class="name">Username: <?php echo htmlspecialchars($userCreds['username']) ?></p>
    </header>
    
    <main>
        <div id="info">
            <h4>Extra Information:</h4>
            <ul>
                <li>Class: <?php echo htmlspecialchars($userCreds['klas'])?></li>
                <li>Favourite Music: <?php echo htmlspecialchars($userCreds['muziek'])?></li>
                <li>Favourite Movie: <?php echo htmlspecialchars($userCreds['film'])?></li>
                <li>Favourite Hobby: <?php echo htmlspecialchars($userCreds['hobby'])?></li>
                <li>IMD Preference: <?php echo htmlspecialchars($userCreds['favoriet'])?></li>
            </ul>

            <div>
                <input type="text" id="postContent" placeholder="Write a new post">
                <a href="" id="btnAddPost">Add</a>
            </div>
        </div>

        <div id="posts">
            <div id="userPost">
                <?php foreach($posts as $post): ?>
                    <div class="post">
                        <strong><?php echo htmlspecialchars($userCreds['firstname'] . " " . $userCreds['lastname']);?> says:</strong>
                        <p id="text"><?php echo($post['text']); ?></p>
                        <a id="btnDelPost" href="">Delete</a>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div>
            <?php if($userFriends == true) : ?>
                <div>
                    <p><?php echo htmlspecialchars($userCreds['firstname'] . " is now friends with:" )?></p>
                    <h4><?php echo htmlspecialchars($userFriends['firstname'] . " " . $userFriends['lastname'])?></h4>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/post.js"></script>
</body>
</html>