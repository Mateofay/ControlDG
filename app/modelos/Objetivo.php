<?php

class Objetivo {
    private $db;

    public function __construct() {
        $this->db = new BaseDeDatos;
    }

    public function getObjetivos() {
        $sql = "SELECT 
        id,
        descripcion,
        valor
        FROM objetivos ";
        
        $this->db->query($sql);

        return $this->db->registros();
    }
}
?>