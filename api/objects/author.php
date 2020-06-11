<?php

class Author {
    private $conn;

    public $id;
    public $name;
    public $nationality;
    public $gender;
    public $birthday;

    public __construct($db) {
        $this->conno = $db;
    }

    public function read() {
        $sql = "SELECT * FROM authors";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $sql = "SELECT * FROM authors WHERE id=:id";
        $stmt -> $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $sql = "INSERT INTO authors (name, nationality, gender, birthday) VALUES(:name, :nationality, :gender, :birthday)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":nationality", $this->nationality);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":birthday", $this->birthday);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $sql = "UPDATE authors SET name=:name, nationality=:nationality, gender=:gender, birthday=:birthday WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":nationality", $this->nationality);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":birthday", $this->birthday);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $sql = "DELETE FROM authors WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}

?>