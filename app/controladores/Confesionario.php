<?php
class Confesionario extends Controlador {
    
    public function __construct() {
        $this->movimientoModelo = $this->cargarModelo('Movimiento');
    }

    public function index() {
        $this->cargarVista('paginas/Confesionario_view');
    }

    public function insertarMovimientos() {
        $detalle = $_POST['detalle'];
        $importe = $_POST['importe'];
        $this->movimientoModelo->insertarMovimientos($importe, $detalle);
        // $this->cargarVista('paginas/Confesionario_view');

    }
}
?>