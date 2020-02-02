<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/style.css">
        <link rel="stylesheet" href="<?=RUTA_URL?>/css/jquery-ui.min.css">
        <script type='text/javascript' src='<?=RUTA_URL?>/js/jquery-3.4.1.js'></script>
        <script src='<?=RUTA_URL?>/js/jquery-ui.min.js'></script>
        <script src='<?=RUTA_URL?>/js/datepicker-es.js'></script>
        <title>Registrar movimiento</title>
    </head>
    <body style="background-color: F7F7F7">

        <?php require RUTA_APP . '/vistas/navbar_view.php' ?>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <fieldset>
                            <h2 class="text-center header">Registrar movimiento</h2>
                            <br>
                            <form autocomplete="off">
                                <div style="margin-left: 280">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                        <div class="col-md-8 input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="importe" name="importe" type="number" step="100" placeholder="Importe" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                        <div class="col-md-8">
                                            <input id="detalle" name="detalle" type="text" placeholder="Detalle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                        <div class="col-md-8">
                                            <input id="fecha" name="fecha" type="text" placeholder="Fecha" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                        <div class="col-md-8">
                                            <textarea id="aclaracion" name="aclaracion" placeholder="Aclaración adicional" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="margin-left: 170">
                                        <select name="tipoMovimiento" id="tipoMovimiento">
                                            <option value="0">-- Tipo de movimiento --</option>
                                            <?php foreach ($datos['tipoMovimientos'] as $tipomov) { ?>
                                                <option value="<?=$tipomov->id?>"><?=$tipomov->nombre?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div style="margin-left: 170">
                                        <select name="cuenta" id="cuenta">
                                            <option value="0">-- Cuenta --</option>
                                            <?php foreach ($datos['cuentas'] as $cuenta) { ?>
                                                <option value="<?=$cuenta->id?>"><?=$cuenta->nombre?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <br><br>
                            <div class="form-group">
                                <div style="margin-left: 16">
                                    <div class="col-md-12 text-center">
                                        <button onclick="registrar()" class="btn btn-primary btn-lg">Registrar</button>
                                        <button onclick="reset()" type="reset" class="btn btn-primary btn-lg">Limpiar</button>
                                        <span id="resultado"></span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <script>
            $("#fecha").datepicker(
                $.datepicker.regional["es"]
            );
            $("#tipoMovimiento").selectmenu();
            $("#cuenta").selectmenu();

            function registrar() {
                if ($('#importe').val() == '' || $('#importe').val() == '0') {
                    alert("Debe especificar el importe");
                    return false;
                }
                if ($('#detalle').val() === '') {
                    alert("Debe especificar el detalle");
                    return false;
                }
                if ($('#fecha').val() === '') {
                    alert("Debe especificar la fecha");
                    return false;
                }
                if ($('#tipoMovimiento').val() === '0') {
                    alert("Debe especificar el tipo de movimiento");
                    return false;
                }
                if ($('#cuenta').val() === '0') {
                    alert("Debe especificar la cuenta asociada al movimiento");
                    return false;
                }
                var parametros = {
                    "importe" : $('#importe').val(),
                    "detalle" : $('#detalle').val(),
                    "fecha" : $('#fecha').val(),
                    "aclaracion" : $('#aclaracion').val(),
                    "tipo" : $('#tipoMovimiento').val(),
                    "cuenta" : $('#cuenta').val()
                };
                $.ajax({
                    data: parametros,
                    url: 'Registrar/registrarMovimiento',
                    type: 'post',
                    beforeSend: function () {
                        $("#resultado").html("");
                    },
                    success: function () {
                        $("#resultado").html("Registrado!");
                    }
                });
            }

            function reset() {
                $("#importe").val('');
                $("#detalle").val('');
                $("#fecha").val('');
                $("#aclaracion").val('');
                $("#tipoMovimiento").val('0');
                $("#tipoMovimiento").selectmenu("refresh");
                $("#cuenta").selectmenu("refresh");
            }
        </script>
    
    </body>
</html>