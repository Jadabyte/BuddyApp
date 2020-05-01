<?php

include_once(__DIR__ . "/nav.inc.php");
include_once(__DIR__ . "/classes/Search.php");

if(isset($_GET['search'])){
    $results = null;
    try {
        $search = new Search();
        $search->setSearchItem($_GET['search']);
        $results = $search->findUser();
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
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" placeholder="Search for people or interests" name="search">
        <input type="submit" value="Search" name="submitSearch">
    </form>
    
    <ul>
        <?php if(isset($_GET['search'])) : ?>
            <p><?php echo "Showing results for: " . htmlspecialchars(ucfirst($_GET['search'])); ?></p>
            <?php foreach($results as $result) :?>
                <li><?php echo htmlspecialchars($result['firstname']) . " " . htmlspecialchars($result['lastname']) ?></li>
        <?php endforeach; endif;?>
    </ul>
</body>
</html>