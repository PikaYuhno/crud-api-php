<?php

include_once './objects/library.php';
include_once './config/dbConnector.php';
$db = DbConnector::getConnection();
$lib = new Library($db);

/*$stmt = $lib->read();
$num = $stmt->rowCount();

if($num > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach($row as $item){
            echo "$item \n";
        }
    }
} else {
    echo "Not Found";
}*/
$lib->location = "Germany";
$lib->name = "Test-Library";

if($lib->create()) {
    echo "Created";
} else {
    echo "Not Created";
}





?>