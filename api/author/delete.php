<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/author.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$author = new Author($db);

$author->id = isset($_GET['id']) ? $_GET['id'] : die();
if($author->delete()) {
    http_response_code(200);
    echo "Succesfully deleted!";
} else {
    http_response_code(404);
}

?>