<?php require RUTA_APP . '/vistas/inc/header.php' ?>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        <fieldset>
                            <legend class="text-center header">Confesionario</legend>
                            <div style="margin-left: 280">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input name="importe" type="dropdown" placeholder="Importe" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input name="detalle" type="text" placeholder="Detalle" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <input name="fecha" type="date" placeholder="Fecha" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                    <div class="col-md-8">
                                        <textarea name="aclaracion" placeholder="Aclaración adicional" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div style="margin-left: 180">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" name="tipo" id="tipo" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tipo de movimiento
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="tipo">
                                            <a class="dropdown-item" href="#">Ingreso</a>
                                            <a class="dropdown-item" href="#">Egreso</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button onclick="confesar()" class="btn btn-primary btn-lg">Confesar</button>
                                    <button onclick="reset()" type="reset" class="btn btn-primary btn-lg">Limpiar</button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    function confesar() {
        console.log('nismannnnnn');
        return false;
    }
</script>