<?php
class Custodio {
    function agregarCustodio($nombre, $apellido_paterno, $apellido_materno, $curp, $rfc, $telefono, $calle, $numero_exterior, $numero_interior, $codigo_postal, $colonia, $estado, $anios_experiencia) {
        $SQL_Ins_Custodio = 
        "INSERT INTO custodio(
            custodio_nombre, custodio_apellido_paterno, custodio_apellido_materno,
            custodio_curp, custodio_rfc, custodio_telefono, custodio_calle,
            custodio_numero_exterior, custodio_numero_interior, custodio_codigo_postal,
            custodio_colonia, custodio_estado, custodio_anios_experiencia)
        VALUES (
            '$nombre', '$apellido_paterno', '$apellido_materno',
            '$curp', '$rfc', '$telefono', '$calle',
            '$numero_exterior', '$numero_interior', '$codigo_postal',
            '$colonia', '$estado', '$anios_experiencia');";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Ins_Custodio);
        $bd->cerrarBD();
    }

    function eliminarCustodio($custodio_id) {
        $SQL_Eli_Custodio = 
        "DELETE FROM custodio
         WHERE custodio_id = $custodio_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Eli_Custodio);
        $bd->cerrarBD();
    }

    function buscarTodos() {
        $SQL_Bus_Custodios = 
        "SELECT custodio_id, custodio_nombre, custodio_apellido_paterno, custodio_apellido_materno,
                custodio_curp, custodio_rfc, custodio_telefono, custodio_calle,
                custodio_numero_exterior, custodio_numero_interior, custodio_codigo_postal,
                custodio_colonia, custodio_estado, custodio_anios_experiencia
         FROM custodio;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Custodios);
        $bd->cerrarBD();
        return $transaccion->traerRegistros();
    }

    function modificarCustodio($custodio_id, $nombre, $apellido_paterno, $apellido_materno, $curp, $rfc, $telefono, $calle, $numero_exterior, $numero_interior, $codigo_postal, $colonia, $estado, $anios_experiencia) {
        $SQL_Act_Custodio = 
        "UPDATE custodio
         SET custodio_nombre = '$nombre',
             custodio_apellido_paterno = '$apellido_paterno',
             custodio_apellido_materno = '$apellido_materno',
             custodio_curp = '$curp',
             custodio_rfc = '$rfc',
             custodio_telefono = '$telefono',
             custodio_calle = '$calle',
             custodio_numero_exterior = '$numero_exterior',
             custodio_numero_interior = '$numero_interior',
             custodio_codigo_postal = '$codigo_postal',
             custodio_colonia = '$colonia',
             custodio_estado = '$estado',
             custodio_anios_experiencia = '$anios_experiencia'
         WHERE custodio_id = $custodio_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Act_Custodio);
        $bd->cerrarBD();
    }

    function buscarCustodio($custodio_id) {
        $SQL_Bus_Custodio = 
        "SELECT custodio_id, custodio_nombre, custodio_apellido_paterno, custodio_apellido_materno,
                custodio_curp, custodio_rfc, custodio_telefono, custodio_calle,
                custodio_numero_exterior, custodio_numero_interior, custodio_codigo_postal,
                custodio_colonia, custodio_estado, custodio_anios_experiencia
         FROM custodio
         WHERE custodio_id = $custodio_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Custodio);
        $custodio = $transaccion->traerObjeto(0);
        $bd->cerrarBD();
        return $custodio;
    }
}
?>
