<?php

class Controlador {

    public function cargarModelo ($modelo) {
        require_once '../app/modelos/'. $modelo .'.php';
        return new $modelo();
    }

    public function cargarVista ($vista, $datos = []) {
        if (file_exists('../app/vistas/'. $vista .'.php')) {
            require_once '../app/vistas/'. $vista .'.php';
        } else {
            die('La vista "'. $vista .'" no existe');
        }
    }

}

?>