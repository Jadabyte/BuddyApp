<?php
    include_once(__DIR__ ."/classes/Message.php");

    if(!empty($_POST)){
        $m = new Message();
        $m->setMessageId($_POST['messageId']);
        $m->setText($_POST['text']);
        $m->setUserId(1);

        $m->save();

        $response = [
            'status' => 'succes',
            'body' => htmlspecialchars($m->getText()),
            'message' => 'Message saved'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>