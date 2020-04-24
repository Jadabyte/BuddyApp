<?php

include_once(__DIR__ . "/nav.inc.php");
include_once(__DIR__ . "/classes/Search.php");

if(isset($_POST['search'])){
    $results = null;
    try {
        $search = new Search();
        $search->setSearchItem($_POST['search']); //change this to get, it's easier to put it in the URL
        //var_dump($_POST['search']);
        $results = $search->findClassroom();
    } catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <title>Lokaal Vinder</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" placeholder="Search for a classroom name or campus" name="search">
        <input type="submit" value="Search" name="submitSearch">
    </form>
    
    <?php if(isset($_POST['search'])) : ?>
        <p><?php echo "Showing results for: " . htmlspecialchars(ucfirst($_POST['search'])); ?></p>
        <?php foreach($results as $result) :?>
            <ul>
                <li>Classroom Name: <?php echo htmlspecialchars($result['name'])?></li>
                <li>Campus: <?php echo htmlspecialchars($result['campus'])?></li>
                <li>Floor: <?php echo htmlspecialchars($result['floor'])?></li>
                <li>Location Description: <?php echo htmlspecialchars($result['description'])?></li>
            </ul>
    <?php endforeach; endif;?>
    
</body>
</html>