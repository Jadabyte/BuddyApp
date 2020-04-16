<?php 
    include_once(__DIR__ . "/classes/likeclass.php");
    $like = new Like;
    $allLikes = $like->getAll(3);
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
       <p> <span class="amount Likes">0</span> Likes</p>
       <p> <span class="amount Laughs">0</span> Laughs</p>
       <p> <span class="amount Angry">0</span> Angry</p>
       <p> <span class="amount Loves">0</span> Loves</p>
       <p> <span class="amount Sad">0</span> Sad</p>
       <a href="#" class="btn like" id="btnLike">👍Like</a>
       <a href="#" class="btn laugh" id="btnLaugh">😂Laugh</a>
       <a href="#" class="btn angry" id="btnAngry">😡Angry</a>
       <a href="#" class="btn love" id="btnLove">😍Love</a>
       <a href="#" class="btn sad" id="btnSad">😢Sad</a>
    </div>

    <!--<script src="app.js"></script>-->
<script>

    //Thibaud Code -- ik heb hier een selectorAll gebruikt om alle buttons te krijgen, deze lijst wordt dan omgezet naar een array om er
    //gemakkelijker aan te geraken
    let btnList = document.querySelectorAll(".btn");
    let btn = Array.from(btnList);

    let amountList = document.querySelectorAll(".amount");
    let amount = Array.from(amountList);

    //clicked variables -- deze variabelen checken of er al op de knop is gedrukt
    var likeClicked = false;
    var laughClicked = false;
    var angryClicked = false;
    var loveClicked = false;
    var sadClicked = false;

    //react variables -- deze variabelen meten hoeveel keren er al op de knop is gedrukt (dit zal naar de databank moeten gestuurd worden)
    var like = 0;
    var laugh = 0;
    var angry = 0;
    var love = 0;
    var sad = 0;

    console.log(btn);
    console.log(btn[0]);
    document.addEventListener("click", function(e){
        e.preventDefault();
        //var amountLikes = parseInt(document.getElementById('amountLikes').innerHTML);
        //var amountLaughs = parseInt(document.getElementById('amountLaughs').innerHTML);
        console.log(e.target);
            //dit is voor de like button
            if(e.target == btn [0] && likeClicked == false){
                console.log("Liked");
                like = like + 1;
                likeClicked = true;
                btn[0].innerHTML = "👍Unlike";
            }
            else if(e.target == btn [0] && likeClicked == true){
                console.log("Unliked");
                like = like - 1;
                likeClicked = false;
                btn[0].innerHTML = "👍Like";
            }
            //dit is voor de laugh button
            else if(e.target == btn [1] && laughClicked == false){
                console.log("Laughed");
                laugh = laugh + 1;
                laughClicked = true;
                btn[1].innerHTML = "😂Unlaugh";
            }
            else if(e.target == btn [1] && laughClicked == true){
                console.log("Unlaughed");
                laugh = laugh - 1;
                laughClicked = false;
                btn[1].innerHTML = "😂Laugh";
            }
        //deze functies zetten de innerHTML van de reacties
        amount[0].innerHTML = like;
        amount[1].innerHTML = laugh;
        amount[2].innerHTML = angry;
        amount[3].innerHTML = love;
        amount[4].innerHTML = sad;
        console.log(like);
        console.log(likeClicked);
    });

//like
/*if(document.querySelector(".btn").innerHTML.includes('Like')){
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
if(document.querySelector(".btn").innerHTML.includes('Laugh')){
    console.log("this is laugh");
    document.getElementById("btnLaugh").innerHTML = "Unlaugh";
    document.getElementById("amountLaughs").innerHTML = amountLaughs += 1;
}
else{
    document.getElementById("btnLaugh").innerHTML = "Laugh";
    document.getElementById("amountLaughs").innerHTML = amountLaughs -= 1;
}
});

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