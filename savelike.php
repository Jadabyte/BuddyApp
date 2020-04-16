<?php
    include_once(__DIR__ . "/likeclass.php");

    if(!empty($_POST)){
        $l = new Like();
       $l -> setMessageId($_POST['messageId']);
        $l-> setUserId(1);

        $l->save();

        $response = [
            'status' => 'success',
            'message' => 'Like saved'
        ];

        header('Content-Type : application/json');
        echo json_encode($response);
    }
?>