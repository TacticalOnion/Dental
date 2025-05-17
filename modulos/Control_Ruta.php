<?php  
include('../clases/BD.php');
include('../clases/Ruta.php');

setlocale(LC_ALL, "es_ES");
date_default_timezone_set("America/Mexico_City");
$obj_Ruta = new Ruta();

if ($_POST['dml'] == 'insert') {
    $estado_inicial = $_POST['estado_inicial'];
    $estado_final = $_POST['estado_final'];
    $pagar_caseta = filter_var($_POST['pagar_caseta'], FILTER_VALIDATE_BOOLEAN);
    $costo_caseta = floatval($_POST['costo_caseta']);
    $tiempo_aproximado = $_POST['tiempo_aproximado'];
    $descripcion = $_POST['descripcion'];

    $obj_Ruta->agregarRuta($estado_inicial, $estado_final, $pagar_caseta, $costo_caseta, $tiempo_aproximado, $descripcion);
    echo 1;

} else if ($_POST['dml'] == 'update') {
    $id = intval($_POST['id']);
    $estado_inicial = $_POST['estado_inicial'];
    $estado_final = $_POST['estado_final'];
    $pagar_caseta = filter_var($_POST['pagar_caseta'], FILTER_VALIDATE_BOOLEAN);
    $costo_caseta = floatval($_POST['costo_caseta']);
    $tiempo_aproximado = $_POST['tiempo_aproximado'];
    $descripcion = $_POST['descripcion'];

    $obj_Ruta->modificarRuta($id, $estado_inicial, $estado_final, $pagar_caseta, $costo_caseta, $tiempo_aproximado, $descripcion);
    echo 1;

} elseif ($_POST['dml'] == 'delete') {
    $id = intval($_POST['id']);
    $obj_Ruta->eliminarRuta($id);
    echo 1;
}
?>
