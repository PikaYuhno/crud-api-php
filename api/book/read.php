<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/book.php';
include_once '../config/dbConnector.php';

$db = DbConnector::getConnection();
$book = new Book($db);

$stmt = $book->read();
$num = $stmt->rowCount();

if($num > 0) {

    $books_arr = array();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $book_item = array(
            "id" => $row['id'],
            "library_id" => $row['library_id'],
            "title" => $row['title'],
            "author_id" => $row['author_id'],
            "published_date" => $row['published_date'],
            "borrowed" => $row['borrowed'],
            "borrowedFrom_id" => $row['borrowedFrom_id']
        );
        array_push($books_arr, $books_item);
    }
    http_response_code(200);
    echo json_decode($books_arr);
} else {
    http_response_code(200);
}


?>