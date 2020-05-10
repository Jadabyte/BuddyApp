<?php
include_once(__DIR__ . "/classes/ForumPost.php");
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/ForumAnswer.php");
include_once(__DIR__ . "/nav.inc.php");
//include_once(__DIR__ . "/classes/forumSeeAnswer.php");


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

if(isset($_POST ['btnsubmit'])){
    if($seeanswer=Answer::seeAnswer()){
        try{      
        
        $success = "Dit zijn alle antwoorden";
        }
        catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    }
    }
     

    // if(isset($_POST ['btnsubmit'])){
    //     try{      
    //         $seeanswer=new seeAnswer();
    //         $seeanswer->setQuestionId($_POST['questionId']);
    //         $seeanswer->seeAnswer();
    //         $success = "Dit zijn alle answers👍";
    //          }
    //         catch (\Throwable $th) {
    //             $error = $th->getMessage();
    //         }
    //     }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/forum.css">
   
</head>
<body>


<h1 id="h1">Mate In IMD - Forum</h1>
<br>

        <?php if(isset($error)): ?>
            <div class="error" style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)) : ?>
            <div class="success"><?php echo $success;?></div>

        <?php endif; ?>

<br>
<br>
        
<div class="div_question">

    <form method="post" name="formQuestion" class="form_question">
        <label for="question" id="question_label">Question:</label><br>
            <input type="text" id="question_input" name="question" placeholder="Type here" class="post_form">
                <br>
                <br>
            <input id="submit" type="submit" value="Submit" name="qstsubmit">
    </form>
</div>

<br>
<br>


    <?php foreach ($seepost as $posts) : ?>

        <div id="seepost">

            <form method="post" class="form_seepost"><input class="pin_seepost" type="submit" value="Pin question" name="pinmode">
                <input type="hidden" value="<?php echo $posts ['ID'] ?>" name="questionId">
            </form>

                <p class="post"> <?php echo $posts ['username']?> : </p>
                
                <p class="post_q" ><?php echo $posts['question'] ?></p>   
                

            <div id="seeanswer">
                <p class="answer"> Comments: </p>
                    <?php foreach ($seeanswer as $answers) : ?>
                        <div>

                            <p class="answer"> <?php echo $answers ['username']?> -

                            <?php echo $answers['comment']?>
                            </p>

                         </div>
                    <?php endforeach; ?> 
            </div>

            <form  method="post" id="form_answer" >
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

</body>
</html>
