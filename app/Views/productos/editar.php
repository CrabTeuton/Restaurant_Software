<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>


            <form method="POST" action="<?php echo base_url(); ?>productos/actualizar"
                autocomplete="off">

                <input type="hidden" id="id" name="id" value="<?php echo $producto['id']; ?>" />

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Código</label>
                            <input class="form-control" id="codigo" name="codigo" type="text"
                                value="<?php echo $producto['codigo']; ?>" autofocus requiered />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre"
                                type="text" value="<?php echo $producto['nombre']; ?>" requiered />
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Unidad</label>
                            <select class="form-control" id="id_unidad" name="id_unidad">
                                <option value="">Seleccionar unidad</option>
                                <?php foreach ($unidades as $unidad) { ?>
                                    <option value="<?php echo $unidad['id']; ?>" <?php if (
                                                                                        $unidad['id'] ==
                                                                                        $producto['id_unidad']
                                                                                    ) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $unidad['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Categoria</label>
                            <select class="form-control" id="id_categoria" name="id_categoria">
                                <option value="">Selecciona categoria</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['id']; ?>" <?php if (
                                                                                        $categoria['id'] ==
                                                                                        $producto['id_categoria']
                                                                                    ) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $categoria['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Precio Venta</label>
                            <input class="form-control" id="precio_venta" name="precio_venta" type="text"
                                value="<?php echo $producto['precio_venta']; ?>" />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Precio Compra</label>
                            <input class="form-control" id="precio_compra" name="precio_compra"
                                type="text" value="<?php echo $producto['precio_compra']; ?>" />
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Stock minimo</label>
                            <input class="form-control" id="stock_minimo" name="stock_minimo" type="text"
                                value="<?php echo $producto['stock_minimo']; ?>" />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Es inventariable</label>
                            <select name="inventariable" id="inventariable" class="form-control">
                                <option value="1" <?php if ($producto['inventariable'] == 1) {
                                                        echo 'selected';
                                                    } ?>>Si</option>
                                <option value="0" <?php if ($producto['inventariable'] == 0) {
                                                        echo 'selected';
                                                    } ?>>No</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label>Imagen</label><br />
                            <img src="<?php echo base_url() . 'images/productos/'.$producto['id'].'.jpg'; ?>" class="img-responsive" width="200px" />
                            <input type="file" id="img_producto" name="img_producto" accept="image/*" />
                            <p class="text-danger">Cargar imagen en formato .jpg</p>
                        </div>
                    </div>
                </div>


                <br />
                <a href="<?php echo base_url(); ?>productos" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>