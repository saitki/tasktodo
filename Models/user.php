<?php
require_once __DIR__ . '/../Database/database.php';

class User {
    private $conn;

    public function __construct() {
        $conexion = new database;
        $this->conn = $conexion->getConnection();
    }

    public function getDataLogin($email, $password) {
        $query = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        
        if ($usuario && $usuario['password'] === $password) {
            $_SESSION['user'] = $usuario['id']; 
            return true;
        }
        
        return false;
    }

    public function getEmail($email) {
        $query = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
          
        if ($usuario) {
            return true;
        }
        return false;
    }
    public function createUser($name, $email, $password) {
        try{
            $query = $this->conn->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            $query->execute([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
            return true;
        } catch (PDOException $e){
            return $e;
        }
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }

   
    public static function logout() {
        
        session_unset();
        session_destroy();
    }
}
?>
