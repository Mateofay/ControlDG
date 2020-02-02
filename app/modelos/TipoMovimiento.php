<?php

class TipoMovimiento {
    private $db;

    public function __construct() {
        $this->db = new BaseDeDatos;
    }

    public function getTipoMovimientos($esAhorro = null) {
        $sql = "SELECT 
        tm.id id,
        tm.nombre nombre
        FROM tipo_movimiento tm ";
        if ($esAhorro !== null) {
            $sql .= "WHERE es_ahorro = ".$esAhorro;
        }
        $this->db->query($sql);

        return $this->db->registros();
    }
}
?>