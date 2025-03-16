<?php

 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprobamos si la sesión está iniciada y si la clave 'role' está definida
if (!isset($_SESSION['user'])) {
   // require './views/header.php';
   header('Location: views/login.php');
} else {
    header('Location: views/task.php');
}

?>