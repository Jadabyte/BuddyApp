<?php
    include_once(__DIR__ . "/classes/Search.php");

    /*if(!empty($_POST)){
        try {
            $search = new Search();
            $search->setSearchItem($_POST['search']);
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }*/


?><nav class="navbar">
    <a href="index.php">Home</a>
    <a href="editProfile">Profile</a>
    <a href="seeFriends.php">View Buddies</a>
    
    <!--<form action="" method="post">
      <input type="text" placeholder="Search for people or interests" name="search">
      <input type="submit" value="Search">
    </form>-->
    
    <a href="logout.php" class="navbar__logout">Logout</a>
</nav>