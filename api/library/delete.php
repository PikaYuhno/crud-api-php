<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/library.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$lib = new Library($db);

$lib->id = isset($_GET['id']) ? $_GET['id'] : die();
if($lib->delete()) {
    http_response_code(200);
    echo "Succesfully deleted!";
} else {
    http_response_code(404);
}

?>