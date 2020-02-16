<?php

// Todos Class

class Todos
{
    // protected arguarments
    protected $connect;
    protected $todoItem;
    protected $todoId;
    protected $editTodo;
    
    // database connection function
    private function dbConnect()
    {
        include 'dbconnect.php';
        $this->connect = $connect;
    }

    // listing todos
    public function list()
    {
        $this->dbConnect();
        $todoResults = [];
        $results = $this->connect->query('SELECT * FROM todos ORDER BY completed ASC');
        while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
            $todoResults[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'completed' => $row['completed']
            ];
        }
        $this->connect->close();
        return $todoResults;
    }
    // this adds a todo
    public function add($todoItem)
    {
        $this->dbConnect();
        $insertedData = mysqli_real_escape_string($this->connect, $todoItem);
        if ($this->connect->query("INSERT INTO todos (`name`, `completed`) VALUES ('$insertedData', 0)")) {
            return header("Refresh:0");
        } else {
            echo mysqli_error($this->connect);
        }
        $this->connect->close();
    }
    // this list out just one todo from the edit
    public function listOne($todoId)
    {
        $this->dbConnect();
        $insertedData = mysqli_real_escape_string($this->connect, $todoId);
        if ($results = $this->connect->query("SELECT `name` FROM todos WHERE `id` = '$insertedData'")) {
            $row = $results->fetch_array(MYSQLI_ASSOC);
            $todoResults = [
                'name' => $row['name']
            ];
        } else {
            echo mysqli_error($this->connect);
        }
        $this->connect->close();
        return $todoResults;
    }
    // edit todos
    public function edit($todoId, $todoItem)
    {
        $this->dbConnect();
        $insertedDataId = mysqli_real_escape_string($this->connect, $todoId);
        $insertedData = mysqli_real_escape_string($this->connect, $todoItem);
        if ($this->connect->query("UPDATE todos SET `name` = '$insertedData' WHERE `id` = '$insertedDataId'")) {
            header('Location: ../');
        } else {
            echo mysqli_error($this->connect);
        }
        $this->connect->close();
    }
    // this changes the status
    public function status($todoId)
    {
        $this->dbConnect();
        $insertedData = mysqli_real_escape_string($this->connect, $todoId);
        if ($this->connect->query("UPDATE todos SET `completed` = !completed WHERE `id` = '$insertedData'")) {
            return header("Refresh:0");
        } else {
            echo mysqli_error($this->connect);
        }
        $this->connect->close();
    }
    // this deletes a todo
    public function delete($todoId)
    {
        $this->dbConnect();
        $insertedData = mysqli_real_escape_string($this->connect, $todoId);
        if ($this->connect->query("DELETE FROM todos WHERE `id` = $insertedData")) {
            return header("Refresh:0");
        } else {
            echo mysqli_error($this->connect);
        }
        $this->connect->close();
    }
}
