<?php

// Iniciar la sesión si aún no se ha iniciado
session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();
unset($_SESSION['user']);  // Elimina la variable 'user' de la sesión
// Redirigir al usuario a la página de login
header('Location: login.php');
die();
exit();

?>