<?php

class Movimiento {
    private $db;

    public function __construct() {
        $this->db = new BaseDeDatos;
    }

    public function getMovimientos(
        $limit = null, 
        $importeDesde = null,
        $importeHasta = null,
        $fechaDesde = null,
        $fechaHasta = null,
        $tipo = null
    ) 
    {
        $sql = "SELECT 
        m.id id,
        m.importe importe,
        m.detalle detalle,
        m.fecha fecha,
        tm.nombre tipo,
        m.aclaracion aclaracion,
        origen.nombre origen,
        destino.nombre destino
        FROM movimientos m
        LEFT JOIN tipo_movimiento tm ON tm.id = m.tipo_id
        LEFT JOIN cuentas origen ON origen.id = m.origen_id
        LEFT JOIN cuentas destino ON destino.id = m.destino_id
        WHERE m.importe is not null";
        if ($importeDesde) {
            $sql .= " AND m.importe > ".$importeDesde;
        }
        if ($importeHasta) {
            $sql .= " AND m.importe < ".$importeHasta;
        }
        if ($fechaDesde) {
            $sql .= " AND m.fecha > ".$fechaDesde;
        }
        if ($fechaHasta) {
            $sql .= " AND m.fecha < ".$fechaHasta;
        }
        if ($tipo !== '0' AND $tipo) {
            $sql .= " AND m.tipo_id = ".$tipo;
        }
        $sql .= " ORDER BY m.fecha DESC";
        if ($limit) {
            $sql .= " LIMIT ".$limit;
        }
        
        $this->db->query($sql);

        $registros = $this->db->registros();
        foreach ($registros as $registro) {
            $registro->fecha = $this->formatearFechaArg($registro->fecha);
        }
        return $registros;
    }

    public function insertarMovimientos($importe, $detalle, $fecha, $aclaracion = '', $tipo) {
        $fecha = $this->formatearFechaABase($fecha);
        $this->db->query("INSERT INTO 
            movimientos (id, importe, detalle, tipo_id, fecha, aclaracion)
            values (null, ".$importe.", '".$detalle."', '".$tipo."', '".$fecha."', '".$aclaracion."')
        ");
        $this->db->execute();
    }

    public function formatearFechaABase($fecha) {
        $fechaFormateada = substr($fecha, 6, 4) . '-' . substr($fecha, 3, 2) . '-' . substr($fecha, 0, 2);
        return $fechaFormateada;
    }

    public function formatearFechaArg($fecha) {
        $fechaFormateada = substr($fecha, 8, 2) . '-' . substr($fecha, 5, 2) . '-' . substr($fecha, 0, 4);
        return $fechaFormateada;
    }

}

?>