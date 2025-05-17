<?php 
include('../clases/BD.php');
include('../clases/Custodio.php');

setlocale(LC_ALL, "es_ES");
date_default_timezone_set("America/Mexico_City");

$obj_Custodio = new Custodio();

if ($_POST['dml'] == 'insert') {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $telefono = $_POST['telefono'];
    $calle = $_POST['calle'];
    $numero_exterior = $_POST['numero_exterior'];
    $numero_interior = $_POST['numero_interior'];
    $codigo_postal = $_POST['codigo_postal'];
    $colonia = $_POST['colonia'];
    $estado = $_POST['estado'];
    $anios_experiencia = $_POST['anios_experiencia'];

    $obj_Custodio->agregarCustodio($id,$nombre,$apellido_paterno,$apellido_materno,$curp,$rfc,$telefono,$calle,$numero_exterior,$numero_interior,$codigo_postal,$colonia,$estado,$anios_experiencia);

    echo 1;

} else if ($_POST['dml'] == 'update') {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $telefono = $_POST['telefono'];
    $calle = $_POST['calle'];
    $numero_exterior = $_POST['numero_exterior'];
    $numero_interior = $_POST['numero_interior'];
    $codigo_postal = $_POST['codigo_postal'];
    $colonia = $_POST['colonia'];
    $estado = $_POST['estado'];
    $anios_experiencia = $_POST['anios_experiencia'];

    $obj_Custodio->modificarCustodio($id,$nombre,$apellido_paterno,$apellido_materno,$curp,$rfc,$telefono,$calle,$numero_exterior,$numero_interior,$codigo_postal,$colonia,$estado,$anios_experiencia);

    echo 1;

} elseif ($_POST['dml'] == 'delete') {
    $id = $_POST['id'];
    $obj_Custodio->eliminarCustodio($id);
    echo 1;
}
?>
