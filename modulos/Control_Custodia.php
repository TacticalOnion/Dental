<?php 
include('../clases/BD.php');
include('../clases/Custodia.php');

setlocale(LC_ALL, "es_ES");
date_default_timezone_set("America/Mexico_City");

$obj_Custodia = new Custodia();

if ($_POST['dml'] == 'insert') {
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];
    $fecha = $_POST['fecha'];
    $custodio_id = $_POST['custodio_id'];
    $auto_id = $_POST['auto_id'];
    $ruta_id = $_POST['ruta_id'];
    $cliente_id = $_POST['cliente_id'];

    $obj_Custodia->agregarCustodia($nombre, $comentario, $fecha, $custodio_id, $auto_id, $ruta_id, $cliente_id);
    echo 1;

} else if ($_POST['dml'] == 'update') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];
    $fecha = $_POST['fecha'];
    $custodio_id = $_POST['custodio_id'];
    $auto_id = $_POST['auto_id'];
    $ruta_id = $_POST['ruta_id'];
    $cliente_id = $_POST['cliente_id'];

    $obj_Custodia->modificarCustodia($id, $nombre, $comentario, $fecha, $custodio_id, $auto_id, $ruta_id, $cliente_id);
    echo 1;

} elseif ($_POST['dml'] == 'delete') {
    $id = $_POST['id'];
    $obj_Custodia->eliminarCustodia($id);
    echo 1;
}
?>
