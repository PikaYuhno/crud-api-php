<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../objects/library.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$lib = new Library($db);

$lib->id = isset($_GET['id']) ? $_GET['id'] : die();
$stmt = $lib->readOne();
$count = $stmt->rowCount();

if($count > 0) {
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $lib_array = array(
        "id" => $row['id'],
        "location" => $row['location'],
        "name" => $row['name']
    );
    
    http_response_code(200);
    echo json_encode($lib_array);
} else {
    http_response_code(404);
}

?>