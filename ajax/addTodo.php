<?php
    include_once(__DIR__ . "/../classes/Todo.php");

    if(!empty($_POST)){
        $todo = new Todo();
        $todo->setContent($_POST['text']);
        //$todo->setUserMail($_SESSION['id']);
        $todo->saveTodo();

        $response = [
            'status' => 'success',
            'body' => htmlspecialchars($todo->getContent()),
            'message' => 'Todo Added'
        ];

        header('Content-type: application.json');
        echo json_encode($response);
    }

?>