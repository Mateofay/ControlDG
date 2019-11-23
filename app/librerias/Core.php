<?php

class Core {
    protected $controlador = 'home';
    protected $metodo = 'index';
    protected $parametros = [];

    public function __construct() {

        $url = $this->getUrl();
        if (file_exists('../app/controladores/'. ucwords($url[0]) .'.php')) {
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controladores/'. $this->controlador .'.php';
        $this->controlador = new $this->controlador;

        if (isset($url[1])) {
            if (method_exists($this->controlador, $url[1])) {
                $this->metodo = $url[1];
                unset($url[1]);
            }
        }

        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>