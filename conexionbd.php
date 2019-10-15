<?php

function conectar () {
    $user = 'root';
    $psw = '';
    $server = 'localhost';
    $db = 'mysql123';
    $con = mysql_connect($server, $user, $psw) or die ('Error al conectarse a la base de datos'.mysql_error());
    mysql_select_db($db, $con);

    return $con;
}

?>