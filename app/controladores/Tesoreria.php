<?php
class Tesoreria extends Controlador {
    
    public function __construct() {
        $this->cuentaModelo = $this->cargarModelo('Cuenta');
        $this->movimientoModelo = $this->cargarModelo('Movimiento');
        $this->objetivoModelo = $this->cargarModelo('Objetivo');
    }

    public function index ()
    {
        $datos['cuentas'] = $this->cuentaModelo->getCuentas(0);
        $datos['cuentasAhorros'] = $this->cuentaModelo->getCuentas(1);
        $datos['saldos'] = $this->cuentaModelo->getTodosLosSaldos();
        $datos['objetivos'] = $this->objetivoModelo->getObjetivos();
        $this->cargarVista('Tesoreria_view', $datos);
    }

    public function registrarMovimiento()
    {
        $importe = $_POST['importe'];
        $origen = $_POST['cuentaOrigen'];
        $destino = $_POST['cuentaDestino'];
        $this->cuentaModelo->actualizarSaldo($origen, '-', $importe);
        $this->cuentaModelo->actualizarSaldo($destino, '+', $importe);
        $this->movimientoModelo->insertarMovimientos($importe, null, date('Y-m-d'), '', 3);
        echo json_encode($this->cuentaModelo->getTodosLosSaldos());
    }

}
?>