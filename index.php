<?php
    include 'classes.php';
    $Todos = new Todos();
    $todoResults = $Todos->list();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addTodo'])) {
        if (empty($_POST['todoItem'])) {
            echo "EMPTY!";
        } else {
            $todoItem = htmlspecialchars($_POST['todoItem']);
            $Todos->add($todoItem);
        }
    };

    if (isset($_POST['delete'])) {
        $todoId = $_POST['delete'];
        $Todos->delete($todoId);
    }

    if (isset($_POST['status'])) {
        $todoId = htmlspecialchars($_POST['status']);
        $Todos->status($todoId);
    }
    

    include 'header.php';
    include 'index.view.php';
    include 'footer.php';
