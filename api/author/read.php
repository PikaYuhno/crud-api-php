<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/author.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$author = new Author($db);

$stmt = $author->read();
$count = $stmt->rowCount();
echo $count;
if($count > 0) {
    $authors = array();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $author_item = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "nationality" => $row['nationality'],
            "gender" => $row['gender'],
            "birthday" => $row['birthday']
        );
        array_push($authors, $author_item);
    }

    http_response_code(200);
    echo json_encode($authors);
} else {
    http_response_code(404);
}


?>