<?php
class Home extends Controlador {
    
    public function __construct() {
        $this->movimientoModelo = $this->cargarModelo('Movimiento');
    }

    public function index () {
        $movimientos = $this->movimientoModelo->getMovimientos('10');
        $this->cargarVista('Home_view', $movimientos);
    }
}
?>