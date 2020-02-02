<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script type='text/javascript' src='<?=RUTA_URL?>/js/jquery-3.4.1.js'></script>
        <script type='text/javascript' src='<?=RUTA_URL?>/js/bootstrap.min.js'></script>
        <title>Tesorería</title>
    </head>
    <body style="background-color: F7F7F7">

        <?php require RUTA_APP . '/vistas/navbar_view.php' ?>

        <br>
        <div class="text-center header">
            <h1 text>Tesorería</h1>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-5">
                <div class="container border contenedorTesoreria1">	
                    <div class="text-center header">
                        <h1 text>Saldo</h1>
                        <br>
                        <img src="<?=RUTA_URL?>/imagenes/billetes.png" height="80" width="80">
                        <br><br>
                        <h1> $
                            <span id="saldoGeneral"> <?=$datos['saldos']['saldoGeneral']?> </span>
                        </h1>
                        <br><br><br><br>
                        <div class="container border" style="text-align: left">
                            <h5> Banco: $
                                <span id="saldoBanco"> <?=$datos['saldos']['banco']?> </span>
                            </h5>
                            <br>
                            <h5> Efectivo: $ 
                                <span id="saldoEfectivo"> <?=$datos['saldos']['efectivo']?> </span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a data-toggle="modal" href="#ahorrar">
                    <div class="flechaVerde"></div>
                </a>

                <div class="modal" id="ahorrar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ahorrar</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form autocomplete="off">
                                    <div style="text-align: center">
                                        <div class="form-group">
                                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                                            <div class="col-md-8 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div style="margin-left: 150">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                </div>
                                                <input id="importe" name="importe" type="number" step="100" placeholder="Importe" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <select name="cuentaOrigen" id="cuentaOrigen">
                                            <option value="0">-- Cuenta Origen --</option>
                                            <?php foreach ($datos['cuentas'] as $cuenta) { ?>
                                                <option value="<?=$cuenta->id?>"><?=$cuenta->nombre?></option>
                                            <?php } ?>
                                        </select>
                                        <br><br>
                                        <select name="cuentaDestino" id="cuentaDestino">
                                            <option value="0">-- Cuenta Destino --</option>
                                            <?php foreach ($datos['cuentasAhorros'] as $cuenta) { ?>
                                                <option value="<?=$cuenta->id?>"><?=$cuenta->nombre?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button onclick="registrarMovimiento('importe', 'cuentaOrigen', 'cuentaDestino')" type="button" class="btn btn-success">Ahorrar</button>
                                <button id="cerrarModal" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a data-toggle="modal" href="#retirarDinero">
                    <div class="flechaRoja"></div>
                </a>

                <div class="modal" id="retirarDinero">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Retirar dinero</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form autocomplete="off">
                                    <div style="text-align: center">
                                        <div class="form-group">
                                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                                            <div class="col-md-8 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div style="margin-left: 150">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                </div>
                                                <input id="importe1" name="importe1" type="number" step="100" placeholder="Importe" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <select name="cuentaOrigen1" id="cuentaOrigen1">
                                            <option value="0">-- Cuenta Origen --</option>
                                            <?php foreach ($datos['cuentasAhorros'] as $cuenta) { ?>
                                                <option value="<?=$cuenta->id?>"><?=$cuenta->nombre?></option>
                                            <?php } ?>
                                        </select>
                                        <br><br>
                                        <select name="cuentaDestino1" id="cuentaDestino1">
                                            <option value="0">-- Cuenta Destino --</option>
                                            <?php foreach ($datos['cuentas'] as $cuenta) { ?>
                                                <option value="<?=$cuenta->id?>"><?=$cuenta->nombre?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button onclick="registrarMovimiento('importe1', 'cuentaOrigen1', 'cuentaDestino1')" type="button" class="btn btn-danger">Retirar</button>
                                <button id="cerrarModal1" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="container border contenedorTesoreria2">	
                    <div class="text-center header">
                        <h1 text>Ahorros</h1>
                        <br>
                        <img src="<?=RUTA_URL?>/imagenes/chanchito.jpg" height="80" width="80">
                        <br><br>
                        <h1> $
                            <span id="saldoAhorros"> <?=$datos['saldos']['saldoAhorros']?> </span>
                        </h1>
                        <br><br>
                        <div class="container border" style="text-align: left">
                            <h5> Banco: $
                                <span id="saldoAhorrosBanco"> <?=$datos['saldos']['ahorrosBanco']?> </span>
                            </h5>
                            <br>    
                            <h5> Efectivo: $
                                <span id="saldoAhorrosEfectivo"> <?=$datos['saldos']['ahorrosEfectivo']?> </span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div style="background-color: rgb(140, 197, 235);">
            <div class="row p-2">
                <div class="col-md-2 text-center">
                    <div style="position: absolute; left: 10%;">
                        <button class="btn btn-secondary" onclick="eliminarObjetivo()">
                            <i class="fas fa-trash-alt"></i>
                             Eliminar 
                        </button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div style="margin-left: -20px">
                        <h3 class="text-center">Objetivos</h3>
                    </div>
                </div>
                <div class="col-md-2">
                    <div style="text-align: right; position: absolute; right: 10%;">
                        <button class="btn btn-secondary">
                            <div style="width: 80px;">
                                <i class="fas fa-plus-square"></i>
                                Nuevo 
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 50px" class="text-center"></th>
                    <th scope="col" style="width: 400px" class="text-center">Objetivo</th>
                    <th scope="col" style="width: 400px" class="text-center">Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['objetivos'] as $objetivo) { ?>
                    <tr>
                        <td class="text-center"><input type="checkbox" value=""></td>
                        <td class="text-center"><?=$objetivo->descripcion?></td>
                        <td class="text-center"><?=$objetivo->valor?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <script>
            
            function eliminarObjetivo()
            {
                
            }

            function registrarMovimiento(importe, origen, destino)
            {
                importe = $('#'+importe).val();
                origen = $('#'+origen).val();
                destino = $('#'+destino).val();
                if (importe == '' || importe == '0') {
                    alert("Debe especificar el importe");
                    return false;
                }
                if (origen === '0' || destino == '0') {
                    alert("Debe especificar las cuentas asociadas al movimiento");
                    return false;
                }
                var parametros = {
                    "importe" : importe,
                    "cuentaOrigen" : origen,
                    "cuentaDestino" : destino,
                };
                $.ajax({
                    data: parametros,
                    url: 'Tesoreria/registrarMovimiento',
                    type: 'post',
                    beforeSend: function () {},
                    success: function (saldos) {
                        saldos = JSON.parse(saldos);
                        $('#ahorrar').modal('hide');
                        $('#retirarDinero').modal('hide');
                        $('#saldoGeneral').html(saldos.saldoGeneral);
                        $('#saldoBanco').html(saldos.banco);
                        $('#saldoEfectivo').html(saldos.efectivo);
                        $('#saldoAhorros').html(saldos.saldoAhorros);
                        $('#saldoAhorrosBanco').html(saldos.ahorrosBanco);
                        $('#saldoAhorrosEfectivo').html(saldos.ahorrosEfectivo);
                    }
                });
            }
        </script>

    </body>
</html>