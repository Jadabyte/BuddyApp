<?php
    include_once(__DIR__ . "/../classes/Posts.php");

    if(!empty($_POST)){
        $post = new Posts();
        $post->setContent($_POST['text']);
        $post->setUser($_POST['id']);

        $post->deletePost();

        $response = [
            'status' => 'success',
            'body' => htmlspecialchars($todo->getContent()),
            'message' => 'Todo Deleted'
        ];

        header('Content-type: application/json');
        echo json_encode($response);
    }