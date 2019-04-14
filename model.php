<?php

function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo_list";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        $result = array('error' => true, 'message' => $conn->connect_error);
        return $result;
    }
    return $conn;
}

function getAll() {
    $conn = connect();
    $sql = "SELECT * FROM todo";

    $query = $conn->query($sql);
    $result = array();
    $count = 0;

    if ($query->num_rows > 0) {
        while($row = $query->fetch_assoc()) {
            $status = $row['status'] ? true : false;
            $result[$count] = array(
                'id' =>  $row["id"],
                'title' => $row["title"],
                'status' => $status,
            );
            $count = $count + 1;
        }
    }

    $conn->close();
    return $result;
}

function getDetail($sql) {
    $conn = connect();

    $query = $conn->query($sql);
    $result = array();
    $count = 0;

    if ($query->num_rows > 0) {
        while($row = $query->fetch_assoc()) {
            $status = $row['status'] ? true : false;
            $result[$count] = array(
                'id' =>  $row["id"],
                'title' => $row["title"],
                'status' => $status,
            );
            $count = $count + 1;
        }
    }

    $conn->close();
    return $result[0];
}

function addTodo($todo) {
    $conn = connect();
    $sql = "INSERT INTO todo (title) VALUES ('$todo')";

    $query = $conn->query($sql);
    $result = array();
    
    if ($query === TRUE) {
        $q = "SELECT * FROM `todo` WHERE `title` = '$todo'";
        $result = getDetail($q);
    } else {
        $result = array(
            'error' => true,
            'message' => $conn->error,
        );
    }

    $conn->close();
    return $result;
}

function updateTodo($id) {
    $conn = connect();
    $q = "SELECT * FROM `todo` WHERE `id` = '$id'";
    $getId = getDetail($q);
    
    $result = array();

    if (count($getId)) {
        $status = $getId['status'] ? 0 : 1;
        $sql = "UPDATE todo SET status='$status' WHERE id=$id";
        $query = $conn->query($sql);

        if ($query === TRUE) {
            $getId['status'] = !$getId['status'];
            $result = $getId;
        } else {
            $result = array(
                'error' => true,
                'message' => $conn->error,
            );
        }
    } else {
        $result = array(
            'error' => true,
            'message' => 'id not found',
        );
    }
    
    $conn->close();
    return $result;
}

function deleteTodo($id) {
    $conn = connect();
    $q = "SELECT * FROM `todo` WHERE `id` = '$id'";
    $getId = getDetail($q);
    
    $result = array();

    if (count($getId)) {   
        $sql = "DELETE FROM todo WHERE id='$id'";
        $query = $conn->query($sql);

        if ($query === TRUE) {
            $getId['status'] = !$getId['status'];
            $result = $getId;
        } else {
            $result = array(
                'error' => true,
                'message' => $conn->error,
            );
        }
    } else {
        $result = array(
            'error' => true,
            'message' => 'id not found',
        );
    }
    
    $conn->close();
    return $result;
}

?> 