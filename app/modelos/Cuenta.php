<?php

class Cuenta {
    private $db;

    public function __construct() {
        $this->db = new BaseDeDatos;
    }

    public function getCuentas($esAhorro = null)
    {
        $sql = "SELECT 
            id,
            nombre
            FROM cuentas ";
        if ($esAhorro !== null) {
            $sql .= "WHERE es_ahorro = ".$esAhorro;
        }
        
        $this->db->query($sql);
        return $this->db->registros();
    }

    public function getSaldoPorCuenta($cuentaId) 
    {
        $sql = "SELECT 
        saldo
        FROM saldo_cuenta
        WHERE id = ".$cuentaId;
        
        $this->db->query($sql);
        return $this->db->registros();
    }

    public function getTodosLosSaldos() 
    {
        $sql = "SELECT saldo FROM saldo_cuenta";
        
        $this->db->query($sql);
        $registros = $this->db->registros();
        
        $datos['banco'] = $registros[0]->saldo;
        $datos['efectivo'] = $registros[1]->saldo;
        $datos['ahorrosBanco'] = $registros[2]->saldo;
        $datos['ahorrosEfectivo'] = $registros[3]->saldo;
        $datos['saldoGeneral'] = $datos['banco'] + $datos['efectivo'];
        $datos['saldoAhorros'] = $datos['ahorrosBanco'] + $datos['ahorrosEfectivo'];

        return $datos;
    }

    public function actualizarSaldo($cuenta, $operacion, $importe)
    {
        $update = "UPDATE saldo_cuenta 
            SET saldo = saldo ".$operacion.$importe."
            WHERE id = $cuenta";
        $this->db->query($update);
        $this->db->execute();
    }

}

?>