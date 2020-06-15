<?php

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


include_once '../objects/library.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$lib = new Library($db);

$body = json_decode(file_get_contents('php://input'));
$lib->id = isset($_GET['id']) ? $_GET['id'] : die();
$lib->location = $body->location;
$lib->name = $body->name;
if($lib->update()) {
    http_response_code(200);
    $updated_item = array(
       "id" => $lib->id,
       "location" => $lib->location,
       "name" => $lib->name 
    );
    echo json_encode($updated_item);
} else {
    http_response_code(200);
}
?>