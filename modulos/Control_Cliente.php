<?php 
include('../clases/BD.php');
include('../clases/Cliente.php');

setlocale(LC_ALL, "es_ES");
date_default_timezone_set("America/Mexico_City");

$obj_Cliente = new Cliente();

if ($_POST['dml'] == 'insert') {
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

    $obj_Cliente->agregarCliente($nombre, $empresa, $telefono, $correo, $comentarios);
    echo 1;

} else if ($_POST['dml'] == 'update') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

    $obj_Cliente->modificarCliente($id, $nombre, $empresa, $telefono, $correo, $comentarios);
    echo 1;

} elseif ($_POST['dml'] == 'delete') {
    $id = $_POST['id'];
    $obj_Cliente->eliminarCliente($id);
    echo 1;
}
?>
