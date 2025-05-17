<?php
	class Usuario
  	{
		// Agregar usuario
    	function agregarUsuario($rol, $persona, $nombreUsu, $contrasenia, $estado)
    	{
			$SQL_Ins_Usuario =
			"	INSERT INTO usuario (usuario_rol_id, usuario_persona_id, usuario_nombre, usuario_contrasenia, usuario_estado)
				VALUES ($rol, $persona, '$nombreUsu', '$contrasenia', $estado);
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Ins_Usuario);
			$bd->cerrarBD();
		}

		// Actualizar usuario
		function actualizarUsuario($rol, $usuario, $nombreUsu)
		{
			$SQL_Act_Usuario= 
			" 	UPDATE usuario
				SET usuario_nombre = '$nombreUsu', usuario_rol_id = $rol
				WHERE usuario_id = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Act_Usuario);
			$bd->cerrarBD();
		}

		// Eliminar usuario
		function eliminarUsuario($usuario)
		{
			$SQL_Eli_Usuario= 
			" 	DELETE FROM usuario
				WHERE usuario_id = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Eli_Usuario);
			$bd->cerrarBD();
		}

		// Buscar usuario
		function buscarUsuario($intIdUsuario)
		{
			$SQL_Bus_Usuario = 
			"	SELECT usuario_id, usuario_rol_id, usuario_nombre, usuario_contrasenia
				FROM rol, usuario
				WHERE rol_id = usuario_rol_id AND usuario_usuario_id = $intIdUsuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}

		// Buscar usuario
		/*
		function buscarResetContra($usuario, $pregunta, $recuperacion)
		{
			$SQL_Bus_Usuario = 
			"	SELECT *
				FROM usuario
				WHERE usuario_nombre = '$usuario' AND usuario_id_preg = $pregunta AND usuario_respuesta = '$recuperacion' AND usuario_estado = TRUE;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}
		*/

		// Buscar todos los usuarios
		function buscarTodosUsuarios()
		{
			$SQL_Bus_usuarios =
			"	SELECT persona_id, usuario_usuario_id, persona_nombre, persona_primer_apellido, persona_segundo_apellido, usuario_estado, rol_nombre
				FROM persona, usuario , rol
				WHERE persona_persona_id = usuario_persona AND rol_id = usuario_rol_id AND rol_id <> 5
				ORDER BY usuario_id ASC;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_usuarios);
			$bd->cerrarBD();
			return ($transaccion_1->traerRegistros());
		}

		// Buscar nombre de usuario
		function buscarNombreUsuario($nombreUsu)
		{
			$SQL_Bus_Usuario = 
			"	SELECT usuario_id, usuario_rol_id, usuario_nombre, usuario_contrasenia
				FROM rol, usuario
				WHERE rol_id = usuario_rol_id AND usuario_nombre = '$nombreUsu';
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}

		// Buscar nombre de usuario
		function buscarUsuarioPersona($persona)
		{
			$SQL_Bus_Usuario = 
			"	SELECT usuario_id, usuario_rol_id, usuario_nombre, usuario_contrasenia
				FROM usuario
				WHERE usuario_persona_id = $persona;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}

		// Modificar estatus
		function modificarEstatus($usuario, $estatus)
		{
			$SQL_Persona_Est="
			UPDATE usuario
			SET usuario_estado = $estatus
			WHERE usuario_id = $usuario";


			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Persona_Est);
			$bd->cerrarBD();
		}

		// Actualizar contraseña
		function actualizarContrasena($usuario, $contra)
		{
			$SQL_Act_Usuario= 
			" 	UPDATE usuario
				SET usuario_contrasenia = '$contra'
				WHERE usuario_id = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Act_Usuario);
			$bd->cerrarBD();
		}

		// Restablecer contraseña
		function resetContrasena($usuario)
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$%&/._-';
			$charactersLength = strlen($characters);
			$contra = '';
			for ($i = 0; $i < 9; $i++) {
				$contra .= $characters[rand(0, $charactersLength - 1)];
			}

			$SQL_Act_Usuario= 
			" 	UPDATE usuario
				SET usuario_contrasenia = '$contra'
				WHERE usuario_id = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Act_Usuario);
			$bd->cerrarBD();

			return $contra;
		}
	}
?>
