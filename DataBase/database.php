<?php
class database {
    
    private $user = "root";
    private $password = "db_todo";
    private $database = "db";
    private $host = "localhost";
    private $conn;
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=". $this->host . ";dbname=".$this->database, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception){
            return $exception->getMessage();
        }
       return $this->conn;
    }
}

?>

