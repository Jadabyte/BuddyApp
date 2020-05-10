<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/Faq.php");
include_once(__DIR__ . "/nav.inc.php");


try{
         
    $pin=Faq::viewPin();
    $success = " hier zijn de meest gestelde vragen";
    }
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/faq.css">
    <title>Document</title>
</head>
<body>

    <h1 id="h1">Freqently asked questions</h1>
    
<br>

<?php if(isset($error)): ?>
     <div class="error" style="color: red;"><?php echo $error; ?></div>
<?php endif; ?>

    <?php foreach ($pin as $pins) : ?>

        <div class="pin"><?php echo $pins['question']?> </div>

        <br>
    <?php endforeach; ?>
</body>
</html>