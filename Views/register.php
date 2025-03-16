<?php 
require_once __DIR__ . '/../Models/user.php';

require_once __DIR__ . "/../Database/database.php";
session_start(); 


if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    header("Location: task.php");
    exit();
}
  
$nameError = "";
$emailError = "";
$name = "";
$email = ""; 

$conexion = new database;
$pdo = $conexion->getConnection();
$registerSuccess = false; 
$userRegister = false; 
$user = new User($pdo);

//$conexion = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true; // Flag para controlar si todo es válido
    
    if (empty($_POST["name"])) {
        $nameError = "Este campo es obligatorio";
        $valid = false;
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
        $emailError = "Este campo es obligatorio";
        $valid = false;
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $passwordError = "Este campo es obligatorio";
        $valid = false;
    } else {
        $password = $_POST["password"];
    }
    $userRegister = $user->getEmail($email);

    if ($valid) {
       if(!$userRegister){
            $user->createUser($name,$email,$password);
            header("Location: login.php");

       } 

    }
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <h3 class="text-center">Registro de Usuario</h3>
        <p class="text-center">o <a href="login.php">iniciar sersion</a> en su cuenta</p>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Usuario</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Ingresa tu nombre" >
                <?php if (!empty($nameError)): ?>
                    <div class="error" style="color:red;"><?php echo $nameError; ?>*</div>
                <?php endif; ?>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Ingresa tu correo" >
                <?php if (!empty($emailError)): ?>
                    <div class="error" style="color:red;"><?php echo $emailError; ?>*</div>
                <?php endif; ?>    
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name = "password" class="form-control" id="password" placeholder="Crea una contraseña">
                <?php if (!empty($passwordError)): ?>
                    <div class="error" style="color:red;"><?php echo $passwordError; ?>*</div>
                <?php endif; ?>    
            </div>

            <p id="lengthError" class="error" style="color:red; font-size: 14px;">Debe tener al menos 8 caracteres*</p>
            <p id="uppercaseError" class="error" style="color:red; font-size: 14px;">Debe contener al menos una letra mayúscula*</p>

            <button type="submit" class="btn btn-primary w-100" id="submitBtn" disabled>Crear Cuenta</button>
            
          
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($userRegister) {
                echo "<div class='text-danger text-center mt-2'>Ya existe el usuario</div>";
            } 
        }
        ?>
    </div>
</div>


<script>
document.getElementById("password").addEventListener("input", function() {
    let password = this.value;
    let lengthError = document.getElementById("lengthError");
    let uppercaseError = document.getElementById("uppercaseError");
    let submitBtn = document.getElementById("submitBtn");

    if (password.length >= 8) {
        lengthError.style.display = "none";
    } else {
        lengthError.style.display = "block";
    }

    if (/[A-Z]/.test(password)) {
        uppercaseError.style.display = "none";
    } else {
        uppercaseError.style.display = "block";
    }

    if (password.length >= 8 && /[A-Z]/.test(password)) {
        successMsg.style.display = "block";
        submitBtn.disabled = false;
    } else {
        successMsg.style.display = "none";
        submitBtn.disabled = true;
    }
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
