<?php
class Cliente {
    function agregarCliente($nombre, $empresa, $telefono, $correo, $comentarios) {
        $SQL_Ins_Cliente = 
        "INSERT INTO cliente (cliente_nombre, cliente_empresa, cliente_telefono, cliente_correo, cliente_comentarios)
         VALUES ('$nombre', '$empresa', '$telefono', '$correo', '$comentarios');";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Ins_Cliente);
        $bd->cerrarBD();
    }

    function eliminarCliente($cliente_id) {
        $SQL_Eli_Cliente = 
        "DELETE FROM cliente
         WHERE cliente_id = $cliente_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Eli_Cliente);
        $bd->cerrarBD();
    }

    function buscarTodos() {
        $SQL_Bus_Clientes = 
        "SELECT cliente_id, cliente_nombre, cliente_empresa, cliente_telefono, cliente_correo, cliente_comentarios
         FROM cliente;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Clientes);
        $bd->cerrarBD();
        return $transaccion->traerRegistros();
    }

    function modificarCliente($cliente_id, $nombre, $empresa, $telefono, $correo, $comentarios) {
        $SQL_Act_Cliente = 
        "UPDATE cliente
         SET cliente_nombre = '$nombre',
             cliente_empresa = '$empresa',
             cliente_telefono = '$telefono',
             cliente_correo = '$correo',
             cliente_comentarios = '$comentarios'
         WHERE cliente_id = $cliente_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Act_Cliente);
        $bd->cerrarBD();
    }

    function buscarCliente($cliente_id) {
        $SQL_Bus_Cliente = 
        "SELECT cliente_id, cliente_nombre, cliente_empresa, cliente_telefono, cliente_correo, cliente_comentarios
         FROM cliente
         WHERE cliente_id = $cliente_id;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Cliente);
        $cliente = $transaccion->traerObjeto(0);
        $bd->cerrarBD();
        return $cliente;
    }
}
?>
