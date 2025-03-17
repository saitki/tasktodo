<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addTaskModalLabel">Nueva Tarea</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
        <input type="hidden" name="action" value="createTask">

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" id="recipient-name" name="title">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion</label>
            <textarea class="form-control" id="message-text" name="description"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Crear Tarea</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>