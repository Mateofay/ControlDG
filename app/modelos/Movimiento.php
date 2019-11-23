<?php

class Movimiento {
    private $db;

    public function __construct() {
        $this->db = new BaseDeDatos;
    }

    public function getMovimientos() {
        $this->db->query("SELECT 
            m.importe importe,
            m.detalle detalle,
            m.fecha fecha,
            tm.nombre tipo
            FROM movimientos m
            LEFT JOIN tipo_movimiento tm ON tm.id = m.tipo_id
            LIMIT 10");
        return $this->db->registros();
    }

    public function insertarMovimientos($importe, $detalle) {
        $this->db->query("INSERT INTO 
            movimientos (id, importe, detalle, tipo_id, fecha)
            values (null, ".$importe.", '".$detalle."', 1, '2019-11-20')
        ");
        $this->db->execute();
    }
}
?>