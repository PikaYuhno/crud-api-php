<?php
class DbConnector {
    private static $connection = null;
    public static $test = "tset";
    public function __contruct() {
        
    }

    public static function getConnection() {
       if(DbConnector::$connection != null) {
           return DbConnector::$connection;
       }
       
       try{
            DbConnector::$connection = new PDO("mysql:host=localhost;dbname=library", "root", "");
       } catch(\PDOException $e) {
           echo $e;
       }
       return DbConnector::$connection;
    }

    
}



?>