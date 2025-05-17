<?php
    class Auto{
        function agregarAuto($marca, $tipo, $color, $anio, $placa, $percance, $disponibilidad, $custodio_id){
            $SQL_Ins_Auto = 
            "INSERT INTO auto(auto_marca, auto_tipo, auto_color, auto_anio, auto_placa, auto_percance, auto_disponibilidad, auto_custodio_id)
            VALUES ('$marca', '$tipo', '$color', '$anio', '$placa', '$percance', '$disponibilidad', $custodio_id)";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Ins_Auto);
            $bd->cerrarBD();
        }

        function eliminarAuto($auto_id){
            $SQL_Eli_Auto = 
            "DELETE FROM auto
            WHERE auto_id = $auto_id;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Eli_Auto);
            $bd->cerrarBD();
        }

        function buscarTodos(){
            $SQL_Bus_Autos = 
            "SELECT auto_id, auto_marca, auto_tipo, auto_color, auto_anio, auto_placa, auto_percance, auto_disponibilidad, auto_custodio_id
            FROM auto;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Bus_Autos);
            $bd->cerrarBD();
            return ($transaccion_1->traerRegistros());
        }

        function modificarAuto($auto_id, $marca, $tipo, $color, $anio, $placa, $percance, $disponibilidad, $custodio_id){
            $SQL_Act_Auto = 
            "UPDATE auto
            SET auto_marca = '$marca',
                auto_tipo = '$tipo',
                auto_color = '$color',
                auto_anio = '$anio',
                auto_placa = '$placa',
                auto_percance = '$percance',
                auto_disponibilidad = '$disponibilidad',
                auto_custodio_id = $custodio_id
            WHERE auto_id = $auto_id;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Act_Auto);
            $bd->cerrarBD();
        }

        function buscarAuto($auto_id){
            $SQL_Bus_Auto = 
            "SELECT auto_id, auto_marca, auto_tipo, auto_color, auto_anio, auto_placa, auto_percance, auto_disponibilidad, auto_custodio_id
            FROM auto
            WHERE auto_id = $auto_id;";

            $bd = new BD();
            $bd->abrirBD();
            $transaccion_1 = new Transaccion($bd->conexion);
            $transaccion_1->enviarQuery($SQL_Bus_Auto);
            $obj_Auto = $transaccion_1->traerObjeto(0);
            $bd->cerrarBD();
            return $obj_Auto;
        } 
    }
?>