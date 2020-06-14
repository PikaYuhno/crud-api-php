<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/author.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$author = new Author($db);

$author->id = isset($_GET['id']) ? $_GET['id']: die();
$stmt = $author->readOne();
$count = $stmt->rowCount();
if($count > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    $author_item = array(
         "id" => $row['id'],
         "name" => $row['name'],
         "nationality" => $row['nationality'],
         "gender" => $row['gender'],
         "birthday" => $row['birthday']
    );
    http_response_code(200);
    echo json_encode($author_item);
} else {
    http_response_code(404);
}


?>