<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/author.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$author = new Author($db);

$body = json_decode(file_get_contents('php://input'));

$author->id = isset($_GET['id']) ? $_GET['id'] : die();
$author->name = $body->name;
$author->nationality = $body->nationality;
$author->gender = $body->gender;
$author->birthday = $body->birthday;

if($author->update()) {
    http_response_code(200);
    $updated_item = array(
       "id" => $author->id,
       "name" => $author->name,
       "nationality" => $author->nationality,
       "gender" => $author->gender,
       "birthday" => $author->birthday
    );
    echo json_encode($updated_item);
} else {
    http_response_code(404);
}


?>