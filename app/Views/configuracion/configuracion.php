<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h4 class="mt-4"><?php echo $titulo ?></h4>

      <?php if (isset($validation)) { ?>
        <div class="alert alert-danger">
          <?php echo $validation->listErrors(); ?>
        </div>
      <?php } ?>

      <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>configuracion/actualizar"
        autocomplete="off">

        <div class="form-group">
          <div class="row">
            <div class="col-12 col-sm-6">
              <label>Nombre del restaurante</label>
              <input class="form-control" id="tienda_nombre" name="tienda_nombre" type="text" value="<?php echo $nombre['valor']; ?>" autofocus required />
            </div>

            <div class="col-12 col-sm-6">
              <label>RFC</label>
              <input class="form-control" id="tienda_rfc" name="tienda_rfc"
                type="text" value="<?php echo $rfc['valor']; ?>" required />
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12 col-sm-6">
              <label>Telefono del restaurante</label>
              <input class="form-control" id="tienda_telefono" name="tienda_telefono" type="text" value="<?php echo $telefono['valor']; ?>"
                autofocus required />
            </div>

            <div class="col-12 col-sm-6">
              <label>Correo del restaurante</label>
              <input class="form-control" id="tienda_email" name="tienda_email"
                type="text" value="<?php echo $email['valor']; ?>" required />
            </div>
          </div>
        </div>


        <div class="form-group">
          <div class="row">
            <div class="col-12 col-sm-6">
              <label>Direccion del restaurante</label>
              <textarea class="form-control" id="tienda_direccion" name="tienda_direccion" requiered><?php echo $direccion['valor']; ?></textarea>
            </div>

            <div class="col-12 col-sm-6">
              <label>Leyenda del ticket</label>
              <textarea class="form-control" id="ticket_leyenda" name="ticket_leyenda" requiered><?php echo $leyenda['valor']; ?></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12 col-sm-6">
              <label>Logo</label><br/>
              <img src="<?php echo base_url() . 'images/logotipo.png';?>" class="img-responsive" width="200px"/>

              <input type="file" id="tienda_logo" name="tienda_logo" accept="image/png"/>
                <p class="text-danger">Cargar imagen en formato .png</p> 
            </div>
          </div>
        </div>
        <br />

        <a href="<?php echo base_url(); ?>configuracion" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
      </form>
    </div>
  </main>


  <!-- Modal eliminar -->
  <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Unidad</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>¿Deseas eliminar unidad?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-ligth" data-bs-dismiss="modal">Cancelar</button>
          <a type="button" class="btn btn-ok btn-primary">Eliminar</a>
        </div>
      </div>
    </div>
  </div>