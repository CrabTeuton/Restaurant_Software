<div id="layoutSidenav_content" class="d-flex flex-column min-vh-100">
  <main class="flex-grow-1">
    <div class="container-fluid px-4">
      <h4 class="mt-4"><?php echo $titulo ?></h4>

      <div class="mb-3">
        <a href="<?php echo base_url(); ?>mesas/nuevo" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Agregar
        </a>
        <a href="<?php echo base_url(); ?>mesas/eliminados" class="btn btn-warning">
          <i class="fa-solid fa-recycle"></i> Eliminadas
        </a>
      </div>

      <div class="table-container flex-grow-1 d-flex flex-column">
        <div class="table-responsive flex-grow-1">
          <table id="datatablesSimple" class="table table-bordered table-hover w-100">
            <thead class="table-dark">
              <tr class="text-center">
                <th>ID</th>
                <th>Nombre</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datos as $dato) { ?>
                <tr class="align-middle">
                  <td class="text-center"><?php echo $dato['id']; ?></td>
                  <td><?php echo $dato['nombre']; ?></td>
                  <td class="text-center">
                    <a href="<?php echo base_url() . 'mesas/editar/' . $dato['id']; ?>"
                      class="btn btn-secondary">
                      <i class="fa-solid fa-pen-to-square"></i> Editar
                    </a>
                  <td>
                    <a href="#" data-href="<?php echo base_url() . 'mesas/eliminar/' . $dato['id']; ?>"
                      data-entidad="Mesa" data-nombre="<?php echo $dato['nombre']; ?>"
                      data-bs-toggle="modal" data-bs-target="#modal-confirma"
                      data-placement="top" title="Eliminar registro"
                      class="btn btn-danger">
                      <i class="fa-solid fa-trash"></i> Eliminar
                    </a>
                  </td>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
</main>

<!-- Modal eliminar -->
<div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Mesa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Deseas eliminar <strong><span id="entidad"></span></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" class="btn btn-ok btn-danger">Eliminar</a>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal-confirma');
    modal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget;
      const nombre = button.getAttribute('data-nombre');
      const entidad = button.getAttribute('data-entidad');

      modal.querySelector('.modal-body span#entidad').textContent = nombre;
      modal.querySelector('.modal-title').textContent = `Eliminar ${entidad}`;
      modal.querySelector('.btn-ok').href = button.getAttribute('data-href');
    });
  });
</script>
</div>