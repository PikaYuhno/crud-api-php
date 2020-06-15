<?php


header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

include_once '../objects/library.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$lib = new Library($db);

$body = json_decode(file_get_contents('php://input'));

$lib->location = $body->location;
$lib->name = $body->name;

if($lib->create()) {
    http_response_code(201);
} else {
    http_response_code(200);
    echo json_encode(-1);
} 

?>