<?php
    include_once(__DIR__ . "/classes/Todo.php");

    /*session_start();
    $email = $_SESSION['email'] = 't.j@student.thomasmore.be';

    $result = Todo::getId($email);
    $id = $result[0]['id'];

    $_SESSION['id'] = $id;
    echo($_SESSION['id']);*/

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
</head>
<body>
    <div id="todos">
        <ul class="todoList">
            <li>This is a todo</li>
        </ul>
    </div>
    <div>
        <input type="text" id="todoContent" placeholder="Create a new todo">
        <a href="#" class="btn" id="btnAddTodo">Add Todo</a>
    </div>
    <script src="js/todo.js"></script>
</body>
</html>