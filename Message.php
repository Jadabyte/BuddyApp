<?php 
include_once(__DIR__ . "/classes/Message.php");
$allMessages = Message::getAll(3);
var_dump($allMessages);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="messages">
    <ul class="message__list">
        <?php foreach($allMessages as $m):?>
        <li><?php echo $m['text'];?></li>
        <?php endforeach;?>
    </ul>
    </div>

    <div class="messages">
    <div class="messages__form">
    <input type="text" id="messageText" placeholder="Type something">
    <a href="#" class="btn" id="btnAddMessage" >Add message</a>
    </div>

    <script src="chat.js"></script>
</body>
</html>