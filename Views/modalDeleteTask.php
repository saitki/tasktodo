<style>.title-modal-delete {
    word-wrap: break-word; /* Rompe las palabras largas */
    white-space: normal; /* Permite que el texto salte de línea */
    overflow-wrap: break-word; /* Asegura el ajuste de texto */
    max-width: 100%; /* Evita que el label sea más ancho que su contenedor */
    display: block; /* Asegura que ocupe todo el ancho disponible */
}</style>
<div class="modal fade" id="DeleteModal<?php echo $task['id']; ?>" tabindex="-1" aria-labelledby="DeleteModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DeleteModalDeleteLabel">Eliminar Tarea</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="" class="title-modal-delete">¿Realmente quieres eliminar la tarea '<?php echo $task['title']?>'?</label>
      </div>
      <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
          <input type="hidden" name="action" value="deleteTask">
          <input type="hidden" name="idTask" value="<?php echo $task['id']; ?>">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="btndeletetask" class="btn btn-primary">Eliminar</button>
          </div>
      </form>
    </div>
  </div>
</div>