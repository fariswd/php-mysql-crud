<?php

include 'controller.php';
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        get();
        break;
    case 'POST':
        post();
        break;
    case 'PUT':
        put();
        break;
    case 'DELETE':
        delete();
        break;
    default:
        notHandle();
        break;
}

?>