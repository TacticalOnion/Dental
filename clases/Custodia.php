<?php
class Custodia {

    function agregarCustodia($nombre, $comentario, $fecha, $custodio_id, $auto_id, $ruta_id, $cliente_id){
        $SQL_Ins_Custodia = 
        "INSERT INTO custodia (
            custodia_nombre, custodia_comentario, custodia_fecha, 
            custodia_custodio_id, custodia_auto_id, custodia_ruta_id, custodia_cliente_id
        ) VALUES (
            '$nombre', '$comentario', '$fecha', 
            $custodio_id, $auto_id, $ruta_id, $cliente_id
        );";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Ins_Custodia);
        $bd->cerrarBD();
    }

    function eliminarCustodia($custodia_id){
        $SQL_Eli_Custodia = 
        "DELETE FROM custodia WHERE custodia_id = $custodia_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Eli_Custodia);
        $bd->cerrarBD();
    }

    function modificarCustodia($custodia_id, $nombre, $comentario, $fecha, $custodio_id, $auto_id, $ruta_id, $cliente_id){
        $SQL_Act_Custodia = 
        "UPDATE custodia SET 
            custodia_nombre = '$nombre',
            custodia_comentario = '$comentario',
            custodia_fecha = '$fecha',
            custodia_custodio_id = $custodio_id,
            custodia_auto_id = $auto_id,
            custodia_ruta_id = $ruta_id,
            custodia_cliente_id = $cliente_id
        WHERE custodia_id = $custodia_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Act_Custodia);
        $bd->cerrarBD();
    }

    function buscarCustodia($custodia_id){
        $SQL_Bus_Custodia = 
        "SELECT * FROM custodia WHERE custodia_id = $custodia_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Custodia);
        $obj_Custodia = $transaccion->traerObjeto(0);
        $bd->cerrarBD();
        return $obj_Custodia;
    }

    function buscarTodos(){
        $SQL_Bus_Todos = "SELECT * FROM custodia;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Todos);
        $registros = $transaccion->traerRegistros();
        $bd->cerrarBD();
        return $registros;
    }
}
?>
