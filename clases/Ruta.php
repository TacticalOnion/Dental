<?php
    class Ruta {
        function agregarRuta($estado_inicial, $estado_final, $pagar_caseta, $costo_caseta, $tiempo_aproximado, $descripcion) {
            // Para booleano en PostgreSQL, se usa TRUE/FALSE sin comillas
            $pagar_caseta_sql = $pagar_caseta ? 'TRUE' : 'FALSE';

            $SQL_Ins_Ruta = 
            "INSERT INTO ruta ( ruta_estado_inicial, ruta_estado_final, ruta_pagar_caseta, ruta_costo_caseta, ruta_tiempo_aproximado, ruta_descripcion)
            VALUES ('$estado_inicial', '$estado_final', $pagar_caseta_sql, $costo_caseta, '$tiempo_aproximado', '$descripcion')";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Ins_Ruta);
            $bd->cerrarBD();
        }

        function eliminarRuta($ruta_id) {
            $SQL_Eli_Ruta = 
            "DELETE FROM ruta
            WHERE ruta_id = $ruta_id;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Eli_Ruta);
            $bd->cerrarBD();
        }

        function buscarTodos() {
            $SQL_Bus_Rutas = 
            "SELECT ruta_id, ruta_estado_inicial, ruta_estado_final, ruta_pagar_caseta, ruta_costo_caseta, ruta_tiempo_aproximado, ruta_descripcion
            FROM ruta;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Bus_Rutas);
            $bd->cerrarBD();
            return $transaccion_1->traerRegistros();
        }

        function modificarRuta($ruta_id, $estado_inicial, $estado_final, $pagar_caseta, $costo_caseta, $tiempo_aproximado, $descripcion) {
            $pagar_caseta_sql = $pagar_caseta ? 'TRUE' : 'FALSE';

            $SQL_Act_Ruta = 
            "UPDATE ruta
            SET 
                ruta_estado_inicial = '$estado_inicial',
                ruta_estado_final = '$estado_final',
                ruta_pagar_caseta = $pagar_caseta_sql,
                ruta_costo_caseta = $costo_caseta,
                ruta_tiempo_aproximado = '$tiempo_aproximado',
                ruta_descripcion = '$descripcion'
            WHERE ruta_id = $ruta_id;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Act_Ruta);
            $bd->cerrarBD();
        }

        function buscarRuta($ruta_id) {
            $SQL_Bus_Ruta = 
            "SELECT ruta_id, ruta_estado_inicial, ruta_estado_final, ruta_pagar_caseta, ruta_costo_caseta, ruta_tiempo_aproximado, ruta_descripcion
            FROM ruta
            WHERE ruta_id = $ruta_id;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Bus_Ruta);
            $obj_Ruta = $transaccion_1->traerObjeto(0);
            $bd->cerrarBD();
            return $obj_Ruta;
        }
    }
?>
