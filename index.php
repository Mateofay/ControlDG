<?php

use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$container = new Container();
$app = AppFactory::create();
AppFactory::setContainer($container);

$container->set('database', function() {
    $user = 'root';
    $psw = '';
    $server = 'localhost';
    $db = 'mysql123';
    $con = new mysqli($server, $user, $psw, $db);
    if ($con->connect_error) {
        die("Error de conexión a la base de datos: " . $con->connect_error);
    }
    return $con;
});

$container->set(\Insertar::class, function($container) {
    return new \Insertar($container->get('database')); 
});

$app->redirect('/', '/Home.php', 301);

$app->post('/Insertar', \Insertar::class . ':insert_form');

$app->run(); 
