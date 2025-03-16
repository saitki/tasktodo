<?php 
require_once __DIR__ . '/../Models/user.php';
require_once __DIR__ . '/../Database/database.php';
session_start(); 

if (!$_SESSION['user']) {
  header("Location: login.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Task Manager</a>
    <nav class="navbar bg-body-tertiary">
    <?php include('modalAddTask.php'); ?>
    <?php include('modalEditTask.php'); ?>
    <?php include('modalDeleteTask.php'); ?>

  <form class="container-fluid justify-content-start">
    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear nueva tarea</button>

    <a class="btn btn-danger me-2" href="../cerrar.php">Cerrar Sesión</a>
    </form>
</nav>
  </div>
</nav>

<div class="container-sm"> 
  
<ul class="list-group" style="margin-top: 20px; padding: 0;">
  <li class="list-group-item d-flex align-items-center justify-content-between border rounded mb-2 shadow-sm p-3">
    <div class="d-flex align-items-center">
    <input class="form-check-input me-3 checkbox-item" type="checkbox" id="firstCheckbox">
    <label class="form-check-label fw-bold list-title" for="firstCheckbox">First checkbox</label>
    </div>
    <!-- Botón de menú desplegable -->
    <div class="dropdown" style="background-color: transparent;">
      <button class="btn btn-light btn-sm dropdown-toggle"style="background-color: transparent; border:  0px;"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
        ☰
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">✏ Editar</a></li>
        <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#DeleteModal">🗑 Eliminar</a></li>
      </ul>
    </div>
  </li>

  <li class="list-group-item d-flex align-items-center justify-content-between border rounded mb-2 shadow-sm p-3">
    <div class="d-flex align-items-center">
      <input class="form-check-input me-3" type="checkbox" value="" id="secondCheckbox">
      <label class="form-check-label fw-bold" for="secondCheckbox">Second checkbox</label>
    </div>
    <div class="dropdown">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        ☰
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">✏ Editar</a></li>
        <li><a class="dropdown-item text-danger" href="#">🗑 Eliminar</a></li>
      </ul>
    </div>
  </li>

  <li class="list-group-item d-flex align-items-center justify-content-between border rounded shadow-sm p-3">
    <div class="d-flex align-items-center">
      <input class="form-check-input me-3" type="checkbox" value="" id="thirdCheckbox">
      <label class="form-check-label fw-bold" for="thirdCheckbox">Third checkbox</label>
    </div>
    <div class="dropdown">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        ☰
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">✏ Editar</a></li>
        <li><a class="dropdown-item text-danger" href="#">🗑 Eliminar</a></li>
      </ul>
    </div>
  </li>
</ul>
</div>

<script>
  const exampleModal = document.getElementById('exampleModal')
if (exampleModal) {
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')
    const modalBodyInputText = exampleModal.querySelector('.modal-body textarea')

    modalTitle.textContent = `Editar tarea ${recipient}`
    modalBodyInput.value = recipient
    modalBodyInputText.value = recipient
  })
}
</script>

<script>
  // Seleccionar todos los checkboxes
  document.querySelectorAll('.checkbox-item').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
      // Obtener el label asociado
      let label = this.nextElementSibling;
      let listItem = this.closest('li');
      // Agregar o quitar subrayado dependiendo del estado del checkbox
      if (this.checked) {
        label.style.textDecoration = 'line-through'; // Tachar el texto
        listItem.style.backgroundColor = '#e0e0e0';  // Cambiar el fondo a gris

      } else {
        label.style.textDecoration = 'none';
        listItem.style.backgroundColor = '';  // Eliminar el fondo gris

      }
    });
  });
</script>
</body>
</html>