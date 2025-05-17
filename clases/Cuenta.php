<?php
	class Cuenta
  	{
        function buscarUsuarioSistema($usuario, $contrasena)
		{
			$SQL_Bus_Usuario = 
			"	SELECT usuario_id, persona_id, persona_nombre, persona_primer_apellido, rol_nombre
				FROM usuario, persona, rol
				WHERE usuario_persona_id = persona_id AND usuario_rol_id = rol_id AND usuario_nombre = '$usuario' AND usuario_contrasenia = '$contrasena';
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}
    }
?>