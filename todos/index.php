<?php

$todoId = htmlspecialchars($_GET['id']);

include '../classes.php';
$Todos = new Todos();
$todoResults = $Todos->listOne($todoId);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editTodo'])) {
    if (empty($_POST['todoItem'])) {
        echo "EMPTY!";
    } else {
        $todoItem = htmlspecialchars($_POST['todoItem']);
        $Todos->edit($todoId, $todoItem);
    }
}

include '../header.php';
include 'index.view.php';
include '../footer.php';
