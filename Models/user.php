<?php
require_once __DIR__ . "/../Database/database.php";
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getDataLogin($email, $password ) {
        $query = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['user'] = $usuario['id'];
            return true;
        }
        return false;
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    public static function logout() {
        session_destroy();
    }
}

?>