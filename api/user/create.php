<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/user.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$user = new User($db);

$body = json_decode(file_get_contents('php://input'));
$user->name = $body->name;
$user->lastName = $body->lastName;
$user->age = $body->age;
$user->birthday = $body->birthday;

if($user->create()) {
    http_response_code(201);
    $user_item = array(
        "id" => $user->id,
        "name" => $user->name,
        "lastName" => $user->lastName,
        "age" => $user->age,
        "birthday" => $user->birthday
    );
    echo json_encode($user_item);
} else {
    http_response_code(503);
} 

?>