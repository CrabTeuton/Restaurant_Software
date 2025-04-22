<div id="layoutSidenav_content" class="d-flex flex-column min-vh-100">
  <main class="flex-grow-1">
    <div class="container-fluid px-4">
      <h4 class="mt-4"><?php echo $titulo ?></h4>

      <div class="mb-3">
        <a href="<?php echo base_url(); ?>productos" class="btn btn-primary">
          <i class="fa-solid fa-arrow-left"></i> Productos
        </a>
      </div>

      <div class="table-container flex-grow-1 d-flex flex-column">
        <div class="table-responsive flex-grow-1">
          <table id="datatablesSimple" class="table table-bordered table-hover w-100">
            <thead class="table-dark">
              <tr class="text-center">
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencias</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datos as $dato) { ?>
                <tr class="align-middle">
                  <td class="text-center"><?php echo $dato['id']; ?></td>
                  <td class="text-center"><?php echo $dato['codigo']; ?></td>
                  <td><?php echo $dato['nombre']; ?></td>
                  <td class="text-end">$<?php echo number_format($dato['precio_venta'], 2); ?></td>
                  <td class="text-center"><?php echo $dato['existencias']; ?></td>
                  <td class="text-center">
                    <a href="#" data-href="<?php echo base_url() . 'productos/reingresar/' . $dato['id']; ?>" data-entidad="Producto" data-nombre="<?php echo $dato['nombre']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-placement="top" title="Reingresar registro" class="btn btn-success">
                      <i class="fa-solid fa-arrow-up-from-bracket"></i> Reingresar
                    </a>
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

<!-- Modal reingresar -->
<div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reingresar Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Deseas reingresar <strong><span id="entidad"></span></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" class="btn btn-ok btn-success">Reingresar</a>
      </div>
    </div>
  </div>
</div>

<script>
  // Script para mostrar el nombre del producto en el modal
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal-confirma');
    modal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget; // Botón que activó el modal
      const nombre = button.getAttribute('data-nombre'); // Obtener el nombre del producto
      const entidad = button.getAttribute('data-entidad'); // Obtener la entidad (Producto)

      // Actualizar el contenido del modal
      const modalBody = modal.querySelector('.modal-body span#entidad');
      modalBody.textContent = nombre;

      // Actualizar el título del modal
      const modalTitle = modal.querySelector('.modal-title');
      modalTitle.textContent = `Reingresar ${entidad}`;

      // Actualizar el enlace de reingreso
      const reingresarLink = modal.querySelector('.btn-ok');
      reingresarLink.href = button.getAttribute('data-href');
    });
  });
</script>
</div>