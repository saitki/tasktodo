<?php

class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getDataLogin($email, $password) {
        $query = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

      
        if ($usuario) {
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
        $query = $this->conn->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $query->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
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
