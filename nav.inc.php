<?php session_start();?>
<nav class="navbar">
    <a href="home.php">Home</a>
    <a href="profile.php?user=<?php echo($_SESSION['user']); ?>">Profile</a>
    <a href="seeFriends.php">View Buddies</a>
    <a href="nearbyFinder.php">Find Food & Drinks</a>
    <a href="classroomSearch.php">Lokaal Vinder</a>
    <a href="editProfile.php">Edit Profile</a>
    <a href="forum.php">Forum</a>
    <a href="logout.php" class="navbar__logout">Logout</a>
</nav>