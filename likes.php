<?php 
    include_once(__DIR__ . "/classes/likeclass.php");
    $allLikes = Like::getAll(3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div class="message">
        <p>Some text on this post/message</p>
       <p> <span id="amountLikes">0</span> Likes</p>
       <p> <span id="amountLaughs">0</span> Laughs</p>
       <p> <span id="amountAngry">0</span> Angry</p>
       <p> <span id="amountLoves">0</span> Loves</p>
       <p> <span id="amountSad">0</span> Sad</p>
       <a href="#" class="btn like" id="btnLike">👍Like</a>
       <a href="#" class="btn laugh" id="btnLaugh">😂Laugh</a>
       <a href="#" class="btn angry" id="btnAngry">😡Angry</a>
       <a href="#" class="btn love" id="btnLove">😍Love</a>
       <a href="#" class="btn sad" id="btnSad">😢Sad</a>
    </div>

    <script src="app.js"></script>
    <script>
        document.querySelector(".btn").addEventListener("click", function(e){
        e.preventDefault();
        var amountLikes = parseInt(document.getElementById('amountLikes').innerHTML);

//like
if(document.getElementById("btnLike").innerHTML.includes('Like')){
    document.getElementById("btnLike").innerHTML = "Unlike";
    document.getElementById("amountLikes").innerHTML = amountLikes += 1;
}
else{
    document.getElementById("btnLike").innerHTML = "Like";
    document.getElementById("amountLikes").innerHTML = amountLikes -= 1;
} 
});

//laugh
document.querySelector(".btn").addEventListener("click", function(e){
        e.preventDefault();
        var amountLaughs = parseInt(document.getElementById('amountLaughs').innerHTML);
if(document.getElementById("btnLaugh").innerHTML.includes('Laugh')){
    document.getElementById("btnLaugh").innerHTML = "Unlaugh";
    document.getElementById("amountLaughs").innerHTML = amountLaughs += 1;
}
else{
    document.getElementById("btnLaugh").innerHTML = "Laugh";
    document.getElementById("amountLaughs").innerHTML = amountLaughss -= 1;
}
});
/*
document.querySelector(".btn").addEventListener("click", function(e){
        e.preventDefault();
        var amountReactions = parseInt(document.getElementById('amountReactions').innerHTML);

//angry
if(document.getElementById("btnAngry").innerHTML.includes('Angry')){
    document.getElementById("btnAngry").innerHTML = "Unangry";
    document.getElementById("amountReactions").innerHTML = amountReactions += 1;
}
else{
    document.getElementById("btnAngry").innerHTML = "Angry";
    document.getElementById("amountReactions").innerHTML = amountReactions -= 1;
}
});

document.querySelector(".btn").addEventListener("click", function(e){
        e.preventDefault();
        var amountReactions = parseInt(document.getElementById('amountReactions').innerHTML);
//love
if(document.getElementById("btnLove").innerHTML.includes('Love')){
    document.getElementById("btnLove").innerHTML = "Unlove";
    document.getElementById("amountReactions").innerHTML = amountReactions += 1;
}
else{
    document.getElementById("btnLove").innerHTML = "Love";
    document.getElementById("amountReactions").innerHTML = amountReactions -= 1;
}
});

    document.querySelector(".btn").addEventListener("click", function(e){
        e.preventDefault();
        var amountReactions = parseInt(document.getElementById('amountReactions').innerHTML);
//sad
if(document.getElementById("btnSad").innerHTML.includes("Sad")){
    document.getElementById("btnSad").innerHTML = "Unsad";
    document.getElementById("amountReactions").innerHTML = amountReactions += 1;
}
else{
    document.getElementById("btnSad").innerHTML = "Sad";
    document.getElementById("amountReactions").innerHTML = amountReactions -= 1;
}

});*/
    </script>
</body>
</html>