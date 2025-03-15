<?php 
require_once __DIR__ . '/DB/db.php'; 
require_once __DIR__ . '/functions.php'; 

$nameError = "";
$emailError = "";
$name = "";
$email = ""; 


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

    if (empty($_POST["message"])) {
        $messageError = "Este campo es obligatorio";
        $valid = false;
    } else {
        $message = $_POST["message"];
    }

    if ($valid) {
       // $status = addUser($name, $lastname, $option, $message, $email, $checkcontacted, $conexion);
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showCustomAlert('Éxito', " . json_encode($status) . ");
            });
        </script>";
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                showCustomAlert('Error', 'Por favor, complete todos los campos obligatorios.');
            });
        </script>";
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
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" placeholder="Ingresa tu usuario">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Crea una contraseña">
            </div>
            <button type="submit" class="btn btn-primary w-100">Crear Cuenta</button>
            <?php if (!empty($nameError)): ?>
                    <div class="error"><?php echo $nameError; ?></div>
            <?php endif; ?>
            <?php if (!empty($emailError)): ?>
                    <div class="error"><?php echo $emailError; ?></div>
            <?php endif; ?>    
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
