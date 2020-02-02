<?php
class Registrar extends Controlador {
    
    public function __construct() {
        $this->movimientoModelo = $this->cargarModelo('Movimiento');
        $this->tipoMovimientoModelo = $this->cargarModelo('TipoMovimiento');
        $this->cuentaModelo = $this->cargarModelo('Cuenta');
    }

    public function index() {
        $datos['tipoMovimientos'] = $this->tipoMovimientoModelo->getTipoMovimientos(0);
        $datos['cuentas'] = $this->cuentaModelo->getCuentas();
        $this->cargarVista('Registrar_view', $datos);
    }

    public function registrarMovimiento() {
        $detalle = $_POST['detalle'];
        $importe = $_POST['importe'];
        $fecha = $_POST['fecha'];
        $aclaracion = $_POST['aclaracion'];
        $tipo = $_POST['tipo'];
        $cuenta = $_POST['cuenta'];
        if ($tipo == 1) {
            $origen = null;
            $destino = $cuenta;
            $operacion = '+';
        } else {
            $origen = $cuenta;
            $destino = null;
            $operacion = '-';
        }
        $this->movimientoModelo->insertarMovimientos($importe, $detalle, $fecha, $aclaracion, $tipo);
        $this->cuentaModelo->actualizarSaldo($cuenta, $operacion, $importe);
    }
}
?>