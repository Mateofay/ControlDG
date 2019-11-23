<?php require RUTA_APP . '/vistas/inc/header.php' ?>
        <br>
        <div class="page-header" id="tituloHome">
            <h1 text >Sistema de control y registro de gastos</h1>
        </div>
        <br>
        <br>
        <h2 id="subtituloHome">Últimos movimientos</h2>
        <br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Tipo</th>
                    <th scope="col">Importe</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos as $datos) { ?>
                    <tr>
                        <th scope="row"><?=$datos->tipo?></th>
                        <td>$<?=$datos->importe?></td>
                        <td><?=$datos->detalle?></td>
                        <td><?=$datos->fecha?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>    
    </body>
</html>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>
