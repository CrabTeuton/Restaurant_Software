<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <?php $idVentaTmp = uniqid(); ?>
            <br />

            <form id="form_venta" name="form_venta" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>ventas/guarda" autocomplete="off">

                <input type="hidden" id="id_venta" name="id_venta" value="<?php echo $idVentaTmp; ?>" />

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="ui-widget">
                                <label>Seleccionar Mesa:</label>
                                <input type="hidden" id="id_mesa" name="id_mesa" value="1" />
                                <input type="text" class="form-control" id="mesa" name="mesa" placeholder="Escribe el nombre de la mesa" onkeyup="" autocomplete="off" required />
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Cantidad de Personas</label>
                            <input class="form-control" id="nombre" name="nombre"
                                type="text" value="<?php echo set_value('nombre') ?>"
                                requiered />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Selecciona menu de la persona X</label>
                            <input class="form-control" id="nombre" name="nombre"
                                type="text" value="<?php echo set_value('nombre') ?>"
                                requiered />
                        </div>

                        <div class="col-sm-6">
                            <label>Forma de pago:</label>
                            <select id="forma_pago" name="forma_pago" class="form-control" required>
                                <option value="001">Efectivo</option>
                                <option value="002">Tarjeta</option>
                                <option value="003">Transferencia</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <input type="hidden" id="id_producto" name="id_producto" />
                            <label>Código de barras</label>

                            <input class="form-control" id="codigo" name="codigo" type="text" placeholder="Escribe el codigo y presiona enter" onkeyup="agregarProducto(event, this.value, 1, '<?php echo $idVentaTmp; ?>');"
                                autofocus />
                        </div>
                        <div class="col-sm-2">
                            <label for="codigo" id="resultado_error" style="color:red;"></label>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="col-12 col-sm-6 offset-md-6">
                                <label style="font-weight: bold; font-size: 30px; text-align: center;">Total $</label>
                                <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight: bold; font-size: 30px; text-align: center;"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" id="completa_venta" class="btn btn-success">Completar venta</button>
                    </div>
                    <br />

                    <div class="row">
                        <table id="tablaProductos" class="table table-hover table-striped table-sm table-responsive tablaProductos" width="100%">
                            <thead class="table-dark">
                                <th>#</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th width="1%"></th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        $(function() {
            $("#mesa").autocomplete({
                source: "<?php echo base_url(); ?>mesas/autocompleteData",
                minLength: 2,
                select: function(event, ui) {
                    event.preventDefault();
                    $("#id_mesa").val(ui.item.id);
                    $("#mesa").val(ui.item.value);
                }
            });
        });

        $(function() {
            $("#codigo").autocomplete({
                source: "<?php echo base_url(); ?>productos/autocompleteData",
                minLength: 2,
                select: function(event, ui) {
                    event.preventDefault();
                    $("#codigo").val(ui.item.value);
                    setTimeout(
                        function() {
                            e = jQuery.Event("keypress");
                            e.which = 13;
                            agregarProducto(e, ui.item.id, 1, '<?php echo $idVentaTmp; ?>');
                        }
                    )
                }
            });
        });

        function agregarProducto(e, id_producto, cantidad, id_venta) {
            let enterKey = 13;
            if (codigo != '') {
                if (e.which == enterKey) {
                    if (id_producto != null && id_producto != 0 && cantidad > 0) {

                        $.ajax({
                            url: '<?php echo base_url(); ?>TemporalCompra/inserta/' + id_producto + '/' + cantidad + '/' + id_venta,

                            success: function(resultado) {
                                if (resultado == 0) {

                                } else {

                                    var resultado = JSON.parse(resultado);

                                    if (resultado.error == '') {
                                        $("#tablaProductos tbody").empty();
                                        $("#tablaProductos tbody").append(resultado.datos);
                                        $("#total").val(resultado.total);

                                        $("#id_producto").val('');
                                        $("#codigo").val('');
                                        $("#nombre").val('');
                                        $("#cantidad").val('');
                                        $("#precio_compra").val('');
                                        $("#subtotal").val('');

                                    }
                                }
                            }
                        });
                    }
                }
            }
        }

        function eliminaProducto(id_producto, id_venta) {

            $.ajax({
                url: '<?php echo base_url(); ?>TemporalCompra/eliminar/' + id_producto + "/" + id_venta,
                success: function(resultado) {
                    if (resultado == 0) {
                        $(tagCodigo).val('');
                    } else {

                        var resultado = JSON.parse(resultado);
                        $("#tablaProductos tbody").empty();
                        $("#tablaProductos tbody").append(resultado.datos);
                        $("#total").val(resultado.total);
                    }
                }
            });
        }

        $(function() {
            $("#completa_venta").click(function() {

                let nFilas = $("#tablaProductos tr").length;
                if (nFilas < 2) {
                    alert("Debe agregar un producto");
                } else {
                    $("#form_venta").submit();
                }
            });
        });
    </script>