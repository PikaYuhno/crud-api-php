<?php

class Book {

    private $conn;

    public $id;
    public $library_id;
    public $title;
    public $author_id;
    public $published_data;
    public $borrowed;
    public $borrowedFrom_id;

    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function read() {
        $sql = "SELECT * FROM books";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $sql = "INSERT INTO (library_id, title, author_id, published_data, borrowed, borrowedFrom_id) VALUES(:library_id,:title,:author_id,:published_date,:borrowed,:borrowedFrom_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":library_id", $this->library_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":published_date", $this->published_date);
        $stmt->bindParam(":borrowed", $this->borrowed);
        $stmt->bindParam(":borrowedFrom_id", $this->borrowedFrom_id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function readOne() {
        $sql = "SELECT * FROM books WHERE id=:id";
        $stmt = $this->$conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $sql = "UPDATE books SET library_id=:library_id, title=:title, author_id=:author_id, published_date=:published_date, borrowed=:borrowed, borrowedFrom_id=:borrowedFrom_id WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":library_id", $this->library_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":published_date", $this->published_date);
        $stmt->bindParam(":borrowed", $this->borrowed);
        $stmt->bindParam(":borrowedFrom_id", $this->borrowedFrom_id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $sql = "DELETE FROM books WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}


?>