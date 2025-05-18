<?php 
include('../clases/BD.php');
include('../clases/Auto.php');

setlocale(LC_ALL, "es_ES");
date_default_timezone_set("America/Mexico_City");
$obj_Auto = new Auto();

if ($_POST['dml'] == 'insert') {
    $marca = $_POST['marca'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $anio = $_POST['anio'];
    $placa = $_POST['placa'];
    $percance = $_POST['percance'];
    $disponibilidad = $_POST['disponibilidad'];
    $custodio_id = $_POST['custodio_id'];

    $obj_Auto->agregarAuto($marca, $tipo, $color, $anio, $placa, $percance, $disponibilidad, $custodio_id);
    echo 1;

} else if ($_POST['dml'] == 'update') {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $anio = $_POST['anio'];
    $placa = $_POST['placa'];
    $percance = $_POST['percance'];
    $disponibilidad = $_POST['disponibilidad'];
    $custodio_id = $_POST['custodio_id'];

    $obj_Auto->modificarAuto($id, $marca, $tipo, $color, $anio, $placa, $percance, $disponibilidad, $custodio_id);
    echo 1;

} elseif ($_POST['dml'] == 'delete') {
    $id = $_POST['id'];
    $obj_Auto->eliminarAuto($id);
    echo 1;
}
?>
