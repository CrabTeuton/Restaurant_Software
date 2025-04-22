<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

                <div>
                    <p>
                        <a href="<?php echo base_url(); ?>/clientes" class="btn btn-warning">Clientes</a>
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


                                <td> 
                                <a href="#" data-href="<?php echo base_url(). '/clientes/reingresar/'.
                                $dato['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma"
                                data-placement="top" title="Reingresar registro" class="btn btn-primary"><i
                                class="fa-solid fa-arrow-up-from-bracket"></i> Reingresar</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
   
<!-- Modal reingresar -->
<div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reingresar producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Deseas reingresar el producto?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" class="btn btn-ok btn-primary">Reingresar</a>
      </div>
    </div>
  </div>
</div>