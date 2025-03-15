<?php
require_once __DIR__ . "/../../config/database.php";
class User {
    public function getDataLogin($email, $password, $pdo ) {
        $query = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
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