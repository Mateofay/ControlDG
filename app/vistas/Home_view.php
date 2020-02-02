<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=RUTA_URL?>/css/style.css">
        <script type='text/javascript' src='<?=RUTA_URL?>/js/jquery-3.4.1.js'></script>
        <script type='text/javascript' src='<?=RUTA_URL?>/js/bootstrap.min.js'></script>
        <title>Control de gastos</title>
    </head>
    <body style="background-color: F7F7F7">

        <?php require RUTA_APP . '/vistas/navbar_view.php' ?>

        <br>
        <div class="text-center header">
            <h2 text >Sistema de control y registro de gastos</h2>
        </div>
        <br>
        <br>
        <h3 style="margin-left: 40">Últimos movimientos</h3>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 150px" class="text-center">Tipo</th>
                    <th scope="col" style="width: 150px" class="text-center">Importe</th>
                    <th scope="col" style="width: 450px" class="text-center">Detalle</th>
                    <th scope="col" style="width: 150px" class="text-center">Origen</th>
                    <th scope="col" style="width: 150px" class="text-center">Destino</th>
                    <th scope="col" style="width: 150px" class="text-center">Fecha</th>
                    <th scope="col" style="width: 100px" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $dato) {
                    $invisible = "invisible";
                    if ($dato->aclaracion) {
                        $invisible = "";
                    } ?>
                    <tr>
                        <th scope="row" class="text-center"><?=$dato->tipo?></th>
                        <td class="text-center">$<?=$dato->importe?></td>
                        <td class="text-center"><?=$dato->detalle?></td>
                        <td class="text-center"><?=$dato->origen?></td>
                        <td class="text-center"><?=$dato->destino?></td>
                        <td class="text-center"><?=$dato->fecha?></td>
                        <td class="text-center">
                            <button type="button" data-toggle="modal" href="#aclaracion<?=$dato->id?>" class="btn btn-info <?=$invisible?>">
                                 Aclaración 
                            </button>
                        </td>
                    </tr>

                    <div class="modal" id="aclaracion<?=$dato->id?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Aclaración</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p><?=$dato->aclaracion?></p>
                                </div>
                                <div class="modal-footer">
                                    <button id="cerrarModal" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </tbody>
        </table>    
    </body>
</html>
