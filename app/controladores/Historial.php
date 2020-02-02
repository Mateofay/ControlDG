<?php
class Historial extends Controlador {
    
    public function __construct() {
        $this->movimientoModelo = $this->cargarModelo('Movimiento');
        $this->tipoMovimientoModelo = $this->cargarModelo('TipoMovimiento');
        $this->cuentaModelo = $this->cargarModelo('Cuenta');
    }

    public function index () {
        $datos['movimientos'] = $this->movimientoModelo->getMovimientos();
        $datos['tiposMovimiento'] = $this->tipoMovimientoModelo->getTipoMovimientos();
        $datos['cuentas'] = $this->cuentaModelo->getCuentas();
        $this->cargarVista('Historial_view', $datos);
    }

    public function buscarHistorial() {
        $importeDesde = $_POST['importeDesde'];
        $importeHasta = $_POST['importeHasta'];
        $fechaDesde = $_POST['fechaDesde'];
        $fechaHasta = $_POST['fechaHasta'];
        $tipo = $_POST['tipo'];
        echo json_encode($this->movimientoModelo->getMovimientos(null, $importeDesde, $importeHasta, $fechaDesde, $fechaHasta, $tipo));
    }
}
?>