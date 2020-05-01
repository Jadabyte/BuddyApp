<?php
    include_once(__DIR__ . "/classes/Todo.php");
    $todos = Todo::getAllTodo();
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
            <li><?php echo $todo['text']; ?></li>
        <?php endforeach; ?>
    </ul>

    <div>
        <input type="text" id="todoContent" placeholder="Create a new Todo">
        <a href="#" id="btnAddTodo">Add</a>
    </div>
    <script src="js/todo.js"></script>
</body>
</html>