
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/user.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$user = new User($db);
$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$stmt = $user->readOne();
$count = $stmt->rowCount();

if($count > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    $user_item = array(
         "id" => $row['id'],
         "name" => $row['name'],
         "lastName" => $row['lastName'],
         "age" => $row['age'],
         "birthday" => $row['birthday']
    );
    http_response_code(200);
    echo json_encode($user_item);
} else {
    http_response_code(404);
}


?>