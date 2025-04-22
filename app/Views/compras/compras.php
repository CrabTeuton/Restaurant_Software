<div id="layoutSidenav_content" class="d-flex flex-column min-vh-100">
  <main class="flex-grow-1">
    <div class="container-fluid px-4">
      <h4 class="mt-4"><?php echo $titulo; ?></h4>

      <div class="mb-3">
        <a href="<?php echo base_url(); ?>compras/eliminados" class="btn btn-warning">
          <i class="fa-solid fa-recycle"></i> Archivos eliminados
        </a>
      </div>

      <div class="table-container flex-grow-1 d-flex flex-column">
        <div class="table-responsive flex-grow-1">
          <table id="datatablesSimple" class="table table-bordered table-hover w-100">
            <thead class="table-dark">
              <tr class="text-center">
                <th>ID</th>
                <th>Folio</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Archivos de ingresos</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($compras as $compra) { ?>
                <tr class="align-middle">
                  <td class="text-center"><?php echo $compra['id']; ?></td>
                  <td><?php echo $compra['folio']; ?></td>
                  <td><?php echo $compra['total']; ?></td>
                  <td><?php echo $compra['fecha_alta']; ?></td>
                  <td class="text-center">
                    <a href="<?php echo base_url() . 'compras/muestraCompraPdf/' . $compra['id']; ?>"
                      class="btn btn-dark">
                      <i class="fa-solid fa-file-pdf"></i> Ver Pdf
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