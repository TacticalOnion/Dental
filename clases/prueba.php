<?php
require_once("BD.php");

$bd = new BD();
$conexion = $bd->abrirBD();

if ($conexion) {
    echo "Conexión exitosa<br>";
} else {
    echo "Error de conexión a la base de datos<br>";
}