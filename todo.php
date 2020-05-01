<?php
    include_once(__DIR__ . "/classes/Todo.php");

    //session_start();
    //$_SESSION['email'] = 't.j@student.thomasmore.be';

    $todos = Todo::getAllTodo();
    //$result = Todo::getId($_SESSION['email']);
    //$_SESSION['id'] = $result[0]['id'];

    //$todo = new Todo;
    //$todo->setUser($_SESSION['id']);
    //echo($todo->getUser());

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>
<body>
    <ul class="todosList">
        <?php foreach($todos as $todo): ?>
            <li> <?php echo $todo['text']; ?> <a href="#" class="remove">complete</a></li>
        <?php endforeach; ?>
    </ul>

    <div>
        <input type="text" id="todoContent" placeholder="Create a new Todo">
        <a href="#" id="btnAddTodo">Add</a>
    </div>
    <script src="js/todo.js"></script>
</body>
</html>