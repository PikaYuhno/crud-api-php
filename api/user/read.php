<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../objects/user.php';
include_once '../config/dbConnector.php';
$db = DbConnector::getConnection();
$user = new User($db);

$stmt = $user->read();
$num = $stmt->rowCount();

if($num > 0) {
    $result = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $item = array(
                "id" => $row['id'],
                "name" => $row['name'],
                "lastName" => $row['lastName'],
                "age" => $row['age'],
                "birthday" => $row['birthday']
            );
            array_push($result, $item);
        
    }
    http_response_code(200);

    echo json_encode($result);

} else {
    http_response_code(200);

    echo json_encode(array("message" => "No Users found."));

}
?>