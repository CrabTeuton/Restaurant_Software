<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>usuarios/insertar"
                autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo set_value('usuario') ?>"
                                autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre"
                                type="text" value="<?php echo set_value('nombre') ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Contraseña</label>
                            <input class="form-control" id="password" name="password" type="password" value="<?php echo set_value('password') ?>"
                             required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Repite contraseña</label>
                            <input class="form-control" id="repassword" name="repassword"
                                type="password" value="<?php echo set_value('repassword') ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Caja</label>
                            <select class="form-control" id="id_caja" name="id_caja">
                                <option value="">Seleccionar caja</option>
                                <?php foreach ($cajas as $caja) { ?>
                                    <option value="<?php echo $caja['id']; ?>"><?php echo $caja['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Rol</label>
                            <select class="form-control" id="id_rol" name="id_rol">
                                <option value="">Selecciona rol</option>
                                <?php foreach ($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <a href="<?php echo base_url(); ?>usuarios" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>