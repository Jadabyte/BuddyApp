<?php
include_once(__DIR__ . "/classes/ForumPost.php");
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/ForumAnswer.php");
include_once(__DIR__ . "/nav.inc.php");


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
        $answer->setAnswer($_POST['comment']);
        $answer->setQuestionId($_POST ['questionId']);
        $answer->submitAnswer();
        $success = "Je hebt op een vraag geantwoord";
        
    }
    catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}

if(isset($_POST['pinmode'])){
    try{
        $pinmode = new Post();
        $pinmode->setQuestionId($_POST ['questionId']);
        $pinmode->pinPost();
        $success = "Je hebt de post gepinned";
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
        $seeanswer=Answer::seeAnswer($questionId);
        $success = "Dit zijn alle answers👍";
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

<!-- <br>
<form action="home.php">
         <button type="submit">Go Back</button>
      </form>
<br> -->


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

    <form method="post" name="formQuestion">
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
        <?php //var_dump($posts ['ID'])?> 

        <div style="background-color:powderblue;">

            <form method="post"><input type="submit" value="Pin question" name="pinmode">
            <input type="hidden" value="<?php echo $posts ['ID'] ?>" name="questionId">
</form>

                <p> <?php echo $posts ['username']?> :
                <br>
                    <?php echo $posts['question'] ?>
                </p>

         <div style="background-color:yellow;">
            <p>Comments: </p>
                <?php foreach ($seeanswer as $answers) : ?>
                    <div style="background-color:pink;">

                        <p> <?php echo $answers ['username']?> :
                        <br>
                        <?php echo $answers['comment']?>
                        </p>

                    </div>
                 <?php endforeach; ?> 
        </div>

    <form  method="post" >
		<div class="form-group">
            <p>Reply to post</p>
            <input type="text"id="textInput" placeholder="Type hier" name="comment">
            <input type="submit" value="Submit" id="btnsubmit"  name="btnsubmit">
            <input type="hidden" value="<?php echo $posts ['ID'] ?>" name="questionId">
        </div>
    </form>
    
   
            
        </div>
        <br>
    <?php endforeach; ?>    
</div>    

<br>
<br>


</body>
</html>

<style>
    div{
        margin-left: 20px;
        padding: 5px;
        width: 70%;
    }
</style>