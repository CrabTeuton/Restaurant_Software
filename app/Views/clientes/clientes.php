<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

                <div>
                    <p>
                        <a href="<?php echo base_url(); ?>/clientes/nuevo" class="btn btn-info">Agregar</a>
                        <a href="<?php echo base_url(); ?>/clientes/eliminados" class="btn btn-warning">Eliminados</a>
                    </p>
                </div>

                <table id="datatablesSimple">
                    <thead>
                            <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($datos as $dato){ ?>
                            <tr>
                                <td><?php echo $dato['id']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['direccion']; ?></td>
                                <td><?php echo $dato['telefono']; ?></td>
                                <td><?php echo $dato['correo']; ?></td>
                                <td> <a href="<?php echo base_url(). '/clientes/editar/'. $dato
                                ['id']; ?>" class="btn btn-warning"><i class="fa-solid
                                fa-pen-to-square"></i> Editar</a></td>

                                <td> 
                                <a href="#" data-href="<?php echo base_url(). '/clientes/eliminar/'.
                                $dato['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma"
                                data-placement="top" title="Eliminar registro" class="btn btn-danger"><i
                                class="fa-solid fa-trash"></i> Eliminar</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
        <p>¿Deseas eliminar la mesa?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" class="btn btn-ok btn-primary">Eliminar</a>
      </div>
    </div>
  </div>
</div>