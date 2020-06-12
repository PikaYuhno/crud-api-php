<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/user.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$user = new User($db);

$body = json_decode(file_get_contents('php://input'));

$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->name = $body->name;
$user->lastName = $body->lastName;
$user->age = $body->age;
$user->birthday = $body->birthday;

if($user->update()) {
    http_response_code(200);
    $updated_item = array(
       "id" => $user->id,
       "name" => $user->name,
       "lastName" => $user->lastName,
       "age" => $user->age,
       "birthday" => $user->birthday
    );
    echo json_encode($updated_item);
} else {
    http_response_code(404);
}


?>