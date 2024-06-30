<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');


$c_database = "osito";
$c_conexion = "localhost";
$c_usuario = "root";
$c_password = "";
$c_port = "3307"; 

function abrirBase_pdo() {
    global $c_database, $c_conexion, $c_usuario, $c_password, $c_port;
    $dsn = "mysql:host=$c_conexion;port=$c_port;dbname=$c_database";
    $nombre_usuario = $c_usuario;
    $password = $c_password;
    $opciones = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_PERSISTENT => false
    );
    
    $gbd = new PDO($dsn, $nombre_usuario, $password, $opciones);
    return $gbd;
}
if (!$pdo = abrirBase_pdo())    
echo '<script>alert("No se pudo conectar a la BD")</script>';
?>