<div class="modal fade" id="editModal<?php echo $task['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Editar Tarea</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
          <input type="hidden" name="action" value="updateTask">
          <input type="hidden" name="idTask" value="<?php echo $task['id']; ?>">

          <div class="mb-3">
            <label for="recipient-name<?php echo $task['id']; ?>" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" id="recipient-name<?php echo $task['id']; ?>" name="title" value="<?php echo $task['title']; ?>">
          </div>
          <div class="mb-3">
            <label for="message-text<?php echo $task['id']; ?>" class="col-form-label">Descripcion</label>
            <textarea class="form-control" id="message-text<?php echo $task['id']; ?>" name="description"><?php echo $task['description']; ?></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="btnsavecar" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
