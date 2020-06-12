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
        $sql = "SELECT * FROM libraries"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $sql = "SELECT * FROM libraries WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $sql = "INSERT INTO libraries (location, name) VALUES(:location, :name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":name", $this->name);

        if($stmt->execute()) return true;
        return false;
    }

    public function update() {
        $sql = "UPDATE libraries SET location=:location, name=:name WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $sql = "DELETE FROM libraries WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    

}


?>