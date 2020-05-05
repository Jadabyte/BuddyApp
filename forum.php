<?php
include_once(__DIR__ . "/classes/forumPost.php");
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/forumAnswer.php");

if(isset($_POST['qstsubmit'])){
    try{
        $post = new Post();
        $post->setQuestion($_POST['question']);
        $post->submitPost();
        $success = "Je vraag staat op het forum!";
    }
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }
} 

if(isset($_POST['btnsubmit'])){
    try{
        $answer = new Answer();
        $answer->setAnswer($_POST['postinput']);
        $answer->submitAnswer();
        $success = "Je hebt op een vraag geantwoord";
    }
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}

    try{      
        $seepost=Post::seePost();
        $success = "Dit zijn alle posts👍";
        }
        catch (\Throwable $th) {
            $error = $th->getMessage();
        }

    try{      
        $seeanwser=Answer::seeAnswer();
        $success = "Dit zijn alle anwsers👍";
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
   
</head>
<body>

<br>
<form action="home.php">
         <button type="submit">Go Back</button>
      </form>
<br>


<h1>Mate In IMD - Forum</h1>
<br>

<?php if(isset($error)): ?>
     <div class="error" style="color: red;"><?php echo $error; ?></div>
<?php endif; ?>

<?php if(isset($success)) : ?>
     <div class="success"><?php echo $success;?></div>

<?php endif; ?>

<br>
<br>
        
<div style="background-color:lightgrey;">
    <form method="post">
        <label for="question">Question:</label><br>
            <input type="text" id="question" name="question">
                <br>
                <br>
            <input type="submit" value="Submit" name="qstsubmit">
    </form>
</div>

<br>
<br>

<div>    
    <?php foreach ($seepost as $posts) : ?>
        <div style="background-color:powderblue;">

                <p> <?php echo $posts ['username']?> :
                <br>
                    <?php echo $posts['question'] ?>
                </p>

         <div style="background-color:yellow;">
            <p>Comments: </p>
                <?php foreach ($seeanwser as $anwsers) : ?>
                    <div style="background-color:pink;">

                        <p> <?php echo $anwsers ['username']?> :
                        <br>
                        <?php echo $anwsers['comment']?>
                        </p>

                    </div>
                 <?php endforeach; ?> 
        </div>

    <form method="post">
		<div class="form-group">
            <p>Reply to post</p>
            <input type="text"id="textInput" placeholder="Type hier" name="postinput">
            <input type="submit" value="Submit" id="btnsubmit"  name="btnsubmit">
        </div>
    </form>
    
    <!-- <form method="post">
            <input type="button" name="answer" value="Reply to question" onclick="onButtonClick()" />

                <input class="hide" type="text" id="textInput" value="" name="postinput"/>
                <button class="hide" id="btnback"onclick="onButtonBackClick()">Close</button>
                <input class="hide" id="btnsubmit" type="submit" value="Submit" name="btnsubmit">
                    
            </form>  -->
            
        </div>
        <br>
    <?php endforeach; ?>    
</div>    

<br>
<br>


</body>
</html>

<!-- <script>
    function onButtonClick(){
        document.getElementById('textInput').className="show";
        document.getElementById('btnback').className="show";
        document.getElementById('btnsubmit').className="show"; 
        }
    function onButtonBackClick(){
        document.getElementById('textInput').className="hide";
        document.getElementById('btnback').className="hide";
        document.getElementById('btnsubmit').className="hide"; 
        }
</script> -->

<style>
    .hide{
                display:none;
    }
    .show{
                display:block;
                margin-top: 10px;
                margin-bottom: 10px;
    }
    div{
        margin-left: 20px;
        padding: 5px;
        width: 70%;
    }
</style>

