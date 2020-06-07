<?php

class Library{
    private $conn;

    public $id;
    public $location;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $sql = "SELECT * FROM library"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $sql = "INSERT INTO library (location, name) VALUES(:location, :name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":name", $this->name);

        if($stmt->execute()) return true;
        return false;
    }

}


?>