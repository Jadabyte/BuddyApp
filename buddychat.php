<?php 
    include_once('Chat.php');
    $Message = new Chat();
    echo $Message->getMessages();
?>