<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/library.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$lib = new Library($db);

$body = json_decode(file_get_contents('php://input'));


if(empty($body) || !(array_key_exists("location", $body) && array_key_exists("name", $body))) {
    http_response_code(400);
    return;
} 
$lib->location = $body->location;
$lib->name = $body->name;

if($lib->create()) {
    http_response_code(201);
} else {
    http_response_code(503);
} 

?>