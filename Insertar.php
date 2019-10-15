<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Insertar {    

private $database;

public function __construct($database) {
    $this->database = $database;
}

    function insert_form(Request $request, Response $response) {
        $body = $request->getParsedBody();
        $importe = $body['importe'];
        $detalle = $body['detalle'];
        $sql = "INSERT into movimientos(id, importe, detalle, tipo, fecha)
                values (null, '$importe', '$detalle', '1', '2019-10-01')";
        $this->database->query($sql);
        echo 'Datos guardados';
        return;
    }
}
?>