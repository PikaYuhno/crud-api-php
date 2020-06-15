<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

include_once '../objects/author.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$author = new Author($db);

$body = json_decode(file_get_contents('php://input'));
$author->name = $body->name;
$author->nationality = $body->nationality;
$author->gender = $body->gender;
$author->birthday = $body->birthday;

if($author->create()) {
    http_response_code(201);
    $author_item = array(
        "id" => $author->id,
        "name" => $author->name,
        "nationality" => $author->nationality,
        "gender" => $author->gender,
        "birthday" => $author->birthday
    );
    echo json_encode($author_item);
} else {
    http_response_code(200);
    echo json_encode(array());
} 

?>