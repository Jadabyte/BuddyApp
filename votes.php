<?php 
    include_once(__DIR__ . "/classes/voteclass.php");
    $allVotes = Vote::getAll(3);
    $vote = new Vote;
    $allVotes = $vote->getAll(3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="post">
        <p class="post_title">Post title 1</p>
        <p class="votes">
        <p> <span class="amount votes">2<span>upvotes</p>
        <a href="#" class="btn upvote" id="upvote" name="upvote">Upvote ⬆️</a>
        </p>
    </div>’
    <div class="post">
        <p class="post_title">Post title 2</p>
        <p class="votes">
        <p> <span class="amount votes">0<span>upvotes</p>
        <a href="#" class="btn upvote" id="upvote" name="upvote">Upvote ⬆️</a>
        </p>
    </div>
    <div class="post">
        <p class="post_title">Post title 3</p>
        <p class="votes">
        <p> <span class="amount votes">0<span>upvotes</p>
        <a href="#" class="btn upvote" id="upvote" name="upvote">Upvote ⬆️</a>
        </p>
    </div>
    <script src="votes.js"></script>
    <script>
        let btnList = document.querySelectorAll(".btn");
        let btn = Array.from(btnList);
        let amountList = document.querySelectorAll(".amount");
        let amount = Array.from(amountList);

        var upvoteClicked = false;
        var upvote = 0;
        console.log(btn);
        console.log(btn[2]);
        document.addEventListener("click", function(e){
            console.log(e.target);
            
            if(e.target == btn[2] && upvoteClicked == false){
                console.log("voted");
                upvote = upvote + 1;
                upvoteClicked = true;
                btn[2].innerHTML = "Voted";

            }

            else if(e.target == btn[2] && upvoteClicked == true){
                console.log("vote removed");
                upvote = upvote-1;
                upvoteClicked = false;
                btn[2].innerHTML = "Upvote ⬆️";
            }

            amount[2].innerHTML = upvote;
            console.log(upvote);
            console.log(upvoteClicked);
        });
    </script>
</body>
</html>