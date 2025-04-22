<div id="layoutSidenav_content" class="d-flex flex-column min-vh-100">
  <main class="flex-grow-1">
    <div class="container-fluid px-4">
      <h4 class="mt-4"><?php echo $titulo; ?></h4>

      <div class="mb-3">
        <a href="<?php echo base_url(); ?>ventas/eliminados" class="btn btn-warning">
          <i class="fa-solid fa-recycle"></i> Tickets Cancelados
        </a>
      </div>

      <div class="table-container flex-grow-1 d-flex flex-column">
        <div class="table-responsive flex-grow-1">
          <table id="datatablesSimple" class="table table-bordered table-hover w-100">
            <thead class="table-dark">
              <tr class="text-center">
                <th class="text-start">Fecha</th>
                <th class="text-start">No. Venta</th>
                <th class="text-start">Mesa</th>
                <th class="text-start">Total</th>
                <th class="text-start">Usuario</th>
                <th class="text-start">Tickets</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datos as $dato) { ?>
                <tr class="align-middle">
                  <td><?php echo $dato['fecha_alta']; ?></td>
                  <td><?php echo $dato['folio']; ?></td>
                  <td><?php echo $dato['mesa']; ?></td>
                  <td><?php echo $dato['total']; ?></td>
                  <td><?php echo $dato['mesero']; ?></td>
                  <td class="text-center">
                    <a href="<?php echo base_url() . 'ventas/muestraTicket/' . $dato['id']; ?>"
                      class="btn btn-secondary">
                      <i class="fa-solid fa-note-sticky"></i> Ver Ticket
                    </a>
                  </td>
                  <td>
                    <a href="#" data-href="<?php echo base_url() . 'ventas/eliminar/' . $dato['id']; ?>"
                      data-entidad="Venta" data-nombre="<?php echo $dato['id']; ?>"
                      data-bs-toggle="modal" data-bs-target="#modal-confirma"
                      class="btn btn-danger">
                      <i class="fa-solid fa-ban"></i> Cancelar Ticket
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>


  <!-- Modal eliminar -->
  <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Venta</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>¿Deseas eliminar el ticket <strong><span id="entidad"></span></strong>?</p>
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
