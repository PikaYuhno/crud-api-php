<?php

class User {
    private $conn;

    public $id;
    public $name;
    public $lastName;
    public $age;
    public $birthday;

    public __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $sql = "SELECT * FROM users WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        $stmt.execute();
        return $stmt;
    }

    public function create() {
        $sql = "INSERT INTO users (name, lastName, age, birthday) VALUES(:name, :lastName, :age, :birthday)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":birthday", $this->birthday);
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update() {
        $sql = "UPDATE users SET name=:name, lastName=:lastName, age=:age, birthday=:birthday WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lastName" $this->lastName);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":birthday", $this->birthday);
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt = $this->prepare($sql);
        $stmt.bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}


?>