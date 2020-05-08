<?php 
    include_once __DIR__ . "/classes/User.php";
    include_once(__DIR__ . "/nav.inc.php");

    if (!empty($_GET)) {
        
        if($_GET['type'] == "drinken"){
            $array = User::findDrinks();
            $type = "drinken";
        } else if($_GET['type'] == "frietjes"){
            $array = User::findFries();
            $type = "frietjes";
        } else if($_GET['type'] == "broodjes"){
            $array = User::findSnacks();
            $type = "broodjes";
        } else if($_GET['type'] == "pizza"){
            $array = User::findPizza();
            $type = "pizza";
        } 

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/nearbyFinder.css">
    
</head>
<body>

<h1>Waar bent u naar opzoek?</h1>
<form action="" method="get">
    <select id="type" name="type">
        <option value="" disabled selected="selected">Kies een type</option>
        <option value="drinken">Drinken</option>
        <option value="frietjes">Frietjes</option>
        <option value="broodjes">Broodjes</option>
        <option value="pizza">Pizza</option>
    </select>
    <input type="submit" value="Zoek">
</form>

<?php if(!empty($_GET)): ?>
    <h1 id="uZocht">U zocht voor <?php echo $type?> in de buurt van Mechelen:</h1>

    <?php foreach($array as $key => $item) : ?>
        <a href="<?php echo $item["url"]; ?>"><h2 class="name"><?php echo $item["name"]; ?></h2></a>
        <p class="address"><?php echo $item["address"]; ?></p> <br>
        </a>
    <?php endforeach; ?>

<?php endif; ?>
</body>
</html>