<?php 
require_once __DIR__ . '/../Models/user.php';
require_once __DIR__ . '/../Database/database.php';
session_start(); 

$conexion = new database;
$pdo = $conexion->getConnection();
$loginSuccess = false; 
$user = new User($pdo); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];


    $loginSuccess = $user->getDataLogin($email, $password);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <h3 class="text-center">Iniciar Sesión</h3>
        <form method="POST"> 
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
        <div class="mt-3 text-center">
            <span>¿No tienes una cuenta? </span><a href="register.php">Registrarse</a>
        </div>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$loginSuccess) {
                echo "<div class='text-danger text-center mt-2'>Credenciales incorrectas</div>";
            } else {
              
                header('Location: task.php');
                exit();
            }
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
