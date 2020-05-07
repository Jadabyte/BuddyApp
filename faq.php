<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/Faq.php");

try{
         
    $pin=Faq::viewPin();
    $success = "hier zijn de meest gestelde vragen";
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
    <title>Document</title>
</head>
<body>

<br>
<form action="home.php">
         <button type="submit">Go Back</button>
      </form>
<br>

    <h1>Freqently asked questions</h1>

    
<br>

<?php if(isset($error)): ?>
     <div class="error" style="color: red;"><?php echo $error; ?></div>
<?php endif; ?>

<?php if(isset($success)) : ?>
     <div class="success"><?php echo $success;?></div>

<?php endif; ?>


    <?php foreach ($pin as $pins) : ?>

        <div style="background-color:lightgreen;" class="pin"><?php echo $pins['question']?> </div>

        <br>
    <?php endforeach; ?>
</body>
</html>