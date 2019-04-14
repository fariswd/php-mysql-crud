<?php
include 'model.php';

function get() {
    $result = array(
        'status' => 200,
        'data' => getAll(),
    );
    echo json_encode($result);
}

function post() {
    if($_POST['title']) {
        $data = addTodo($_POST['title']);
        $result = array(
            'status' => 200,
            'data' => $data,
        );
        echo json_encode($result);
    } else {
        $result = array(
            'status' => 500,
            'error'  => true,
            'message' => 'title body is not found'
        );
        echo json_encode($result);

    }
}

function put() {
    if($_GET['id']) {
        $data = updateTodo($_GET['id']);
        $result = array(
            'status' => 200,
            'data' => $data,
        );
        echo json_encode($result);
    } else {
        $result = array(
            'status' => 500,
            'error'  => true,
            'message' => 'query id is not found'
        );
        echo json_encode($result);

    }
}

function delete() {
    if($_GET['id']) {
        $data = deleteTodo($_GET['id']);
        $result = array(
            'status' => 200,
            'message' => 'delete success',
            'oldData' => $data,
        );
        echo json_encode($result);
    } else {
        $result = array(
            'status' => 500,
            'error'  => true,
            'message' => 'query id is not found'
        );
        echo json_encode($result);

    }
}

function notHandle() {
    $result = array('message' => 'not supported method');
    echo json_encode($result);
}

?>