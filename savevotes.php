<?php
    include_once(__DIR__ . "/classes/voteclass.php");

    if(!empty($_POST)){
        $v = new Vote();
        $v -> setPostId($_POST['postId']);
        $v -> setUserId(1);
        $v ->save();

        $response = [
            'status' => 'succes',
            'message' => 'upvote saved'
        ];

        header('Content-Type : application/json');
        echo json_encode($response);
    }
?>