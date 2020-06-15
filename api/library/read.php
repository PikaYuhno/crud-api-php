<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/library.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$lib = new Library($db);

$stmt = $lib->read();
$num = $stmt->rowCount();

if($num > 0) {
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $libraryObj = array(
                "id" => $row['id'],
                "location" => $row['location'],
                "name" => $row['name']
            );
            array_push($result, $libraryObj);
        
    }
    http_response_code(200);

    echo json_encode($result);

} else {
    http_response_code(404);
    echo json_encode([]);
}

?>