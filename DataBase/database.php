<?php
class database {  
    private $user = "root";
    private $password = "";
    private $database = "db_todo";
    private $host = "localhost";
    private $conn;
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception){
            die("Error de conexión: " . $exception->getMessage()); // Muestra el error y detiene la ejecución        }
        }
        return $this->conn;
    }
}
?>

