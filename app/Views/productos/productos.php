<div id="layoutSidenav_content" class="d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <div class="mb-3">
                <a href="<?php echo base_url(); ?>productos/nuevo" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Agregar
                </a>
                <a href="<?php echo base_url(); ?>productos/eliminados" class="btn btn-warning">
                    <i class="fa-solid fa-recycle"></i> Eliminados
                </a>
                <a href="<?php echo base_url(); ?>productos/muestraCodigos" class="btn btn-success">
                <i class="fa-solid fa-barcode"></i> Codigos de barras
                </a>
            </div>

            <div class="table-container flex-grow-1 d-flex flex-column">
                <div class="table-responsive flex-grow-1">
                    <table id="datatablesSimple" class="table table-bordered table-hover w-100">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th class="text-start">ID</th>
                                <th class="text-start">Código</th>
                                <th class="text-start">Nombre</th>
                                <th class="text-start">Precio</th>
                                <th class="text-start">Existencias</th>
                                <th class="text-start">Imagen</th>
                                <th></th>
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
                                    <td class="text-center"><img src="<?php echo base_url() . 'images/productos/'.$dato['id'].'.jpg'; ?>" width="100"/></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'productos/editar/' . $dato['id']; ?>" class="btn btn-secondary">
                                            <i class="fa-solid fa-pen-to-square"></i> Editar
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" data-href="<?php echo base_url() . 'productos/eliminar/' . $dato['id']; ?>" data-entidad="Producto" data-nombre="<?php echo $dato['nombre']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i> Eliminar
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Producto</h1>
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
    // Script para mostrar el nombre del producto en el modal
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modal-confirma');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Botón que activó el modal
            const nombre = button.getAttribute('data-nombre'); // Obtener el nombre del producto
            const entidad = button.getAttribute('data-entidad'); // Obtener la entidad (Producto)

            // Actualizar el contenido del modal
            const modalBody = modal.querySelector('.modal-body span#entidad');
            modalBody.textContent = nombre;

            // Actualizar el título del modal
            const modalTitle = modal.querySelector('.modal-title');
            modalTitle.textContent = `Eliminar ${entidad}`;

            // Actualizar el enlace de eliminación
            const deleteLink = modal.querySelector('.btn-ok');
            deleteLink.href = button.getAttribute('data-href');
        });
    });
</script>