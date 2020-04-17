<?php 
    include_once(__DIR__ . "/classes/likeclass.php");
    $allLikes = Like::getAll(3);
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

    <script src="app.js"></script>
 <script>
//Thanks voor Thibaud om me hiermee op weg te helpen - Annelies
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

            //angry
            else if(e.target == btn[2] && angryClicked == false){
                console.log("Angry");
                angry = angry +1;
                angryClicked = true;
                btn[2].innerHTML = "😡Unangry"
            }
            else if(e.target == btn[2] && angryClicked == true){
                console.log("Unangry");
                angry = angry - 1;
                angryClicked = false;
                btn[2].innerHTML = "😡Angry"
            }

            //love
            else if(e.target == btn[3] && loveClicked == false){
                console.log("Loved");
                love = love +1;
                loveClicked = true;
                btn[3].innerHTML = "😍Unlove"
            }
            else if(e.target == btn[3] && loveClicked == true){
                console.log("Unloved");
                love = love - 1;
                loveClicked = false;
                btn[3].innerHTML = "😍Love"
            }

            //sad
            else if(e.target == btn[4] && sadClicked == false){
                console.log("Angry");
                sad = sad +1;
                sadClicked = true;
                btn[4].innerHTML = "😢Unsad"
            }
            else if(e.target == btn[4] && sadClicked == true){
                console.log("Unangry");
                sad = sad - 1;
                sadClicked = false;
                btn[4].innerHTML = "😢Sad"
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
    </script> 
</body>
</html>