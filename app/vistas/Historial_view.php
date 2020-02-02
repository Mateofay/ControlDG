<?php 
$movimientos = $datos['movimientos'];
$tiposMovimiento = $datos['tiposMovimiento'];
$cuentas = $datos['cuentas'];
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/style.css">
        <link rel="stylesheet" href="<?=RUTA_URL?>/css/jquery-ui.min.css">
        <script type='text/javascript' src='<?=RUTA_URL?>/js/jquery-3.4.1.js'></script>
        <script src='<?=RUTA_URL?>/js/jquery-ui.min.js'></script>
        <script src='<?=RUTA_URL?>/js/datepicker-es.js'></script>
        <title>Historial</title>
    </head>
    <body style="background-color: F7F7F7">

        <?php require RUTA_APP . '/vistas/navbar_view.php' ?>

        <br>
        <div class="text-center header">
            <h2 text >Historial de movimientos</h2>
        </div>
        <br><br><br>
        <div class="row" style="margin-left: 5">
            <div class="col-md-3 border">
                <div class="list-group">
                    <h3>Importe</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label><input id="importeDesde" name="importeDesde" type="number" placeholder="Desde" step="100" class="form-control"></label>
                        </div>
                        <div class="col-md-6">
                            <label><input id="importeHasta" name="importeHasta" type="number" placeholder="Hasta" step="100" class="form-control"></label>
                        </div>
                    </div>
                    <br>
                    <h3>Fecha</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label><input id="fechaDesde" name="fechaDesde" type="text" placeholder="Desde" class="form-control"></label>
                        </div>
                        <div class="col-md-6">
                            <label><input id="fechaHasta" name="fechaHasta" type="text" placeholder="Hasta" class="form-control"></label>
                        </div>
                    </div>
                    <br><br>
                    <div style="margin-left: 48">
                        <select name="tipoMovimiento" id="tipoMovimiento">
                            <option value="0">-- Tipo de movimiento --</option>
                            <?php foreach ($tiposMovimiento as $tipoMovimiento) { ?>
                                <option value="<?=$tipoMovimiento->id?>"><?=$tipoMovimiento->nombre?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <div style="margin-left: 48">
                        <select name="cuenta" id="cuenta">
                            <option value="0">-- Cuenta --</option>
                            <?php foreach ($cuentas as $cuenta) { ?>
                                <option value="<?=$cuenta->id?>"><?=$cuenta->nombre?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br><br>
                    <button onclick="buscar()" class="btn btn-primary btn-lg">
                        Buscar
                    </button>
                    <br>
                </div>
            </div>
            <div class="col-md-9 border">
                <table class="table border" style="margin-left: -18" id="tablaMovs">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tipo</th>
                            <th>Importe</th>
                            <th>Detalle</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($movimientos as $movimiento) { ?>
                            <tr>
                                <th scope="row"><?=$movimiento->tipo?></th>
                                <td>$<?=$movimiento->importe?></td>
                                <td><?=$movimiento->detalle?></td>
                                <td><?=$movimiento->fecha?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script>

            $("#fechaDesde").datepicker(
                $.datepicker.regional["es"]
            );
            $("#fechaHasta").datepicker(
                $.datepicker.regional["es"]
            );
            $("#tipoMovimiento").selectmenu();
            $("#cuenta").selectmenu();

            function buscar() {
                var parametros = {
                    "importeDesde" : $('#importeDesde').val(),
                    "importeHasta" : $('#importeHasta').val(),
                    "fechaDesde" : $('#fechaDesde').val(),
                    "fechaHasta" : $('#fechaHasta').val(),
                    "tipo" : $('#tipoMovimiento').val()
                };
                $.ajax({
                    data: parametros,
                    url: 'Historial/buscarHistorial',
                    type: 'post',
                    beforeSend: null,
                    success: function (movimientos) {
                        movimientos = JSON.parse(movimientos)
                        let movimientosFiltrados = '';
                        for(let mov of movimientos) {
                            movimientosFiltrados += `
                            <tr> 
                                <th scope="row">${mov.tipo}</th>
                                <td>${mov.importe}</td>
                                <td>${mov.detalle}</td>
                                <td>${mov.fecha}</td>
                            </tr>`;
                        }
                        $('#tablaMovs tbody').html(movimientosFiltrados);
                    }
                });
            }

        </script>

    </body>
</html>