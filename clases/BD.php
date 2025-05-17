<?php

class BD
{
	public $servidor;
	public $usuario;
	public $password;
	public $puerto;
	public $bd;
	public $conexion;
	public $cadena_conexion;
	public $imagen;

	function __construct($strBD = "")
	{
		$this->servidor = "localhost";
		$this->usuario  = "postgres";
		$this->password = "database2000";
		$this->puerto   = "5432";
		$this->bd       = ($strBD != "") ? $strBD : "corpositt";
		$this->cadena_conexion = "host=" . $this->servidor . " port=" . $this->puerto . " dbname=" . $this->bd . " user=" . $this->usuario . " password=" . $this->password;
	}

	function abrirBD()
	{
		if ($this->conexion = pg_connect($this->cadena_conexion)) {
			return $this->conexion;
		} else {
			return false;
		}
	}

	function cerrarBD()
	{
		pg_close($this->conexion);
	}
}

class Transaccion
{
	public $conexion;
	public $query;
	public $queryasincrono;
	public $error;
	public $oid;
	public $imagen;

	function __construct($conexion)
	{
		$this->conexion = $conexion;
	}

	// Ejecuta instrucción DML
	function enviarQuery($sql)
	{
		$this->query = pg_query($this->conexion, $sql);
		if ($this->query) {
			$this->oid = pg_last_oid($this->query);
			return $this->query;
		} else {
			return false;
		}
	}

	// Ejecuta múltiples queries como transacción
	function enviarQueryAsincrono($sqls, $numsqls)
	{
		pg_set_error_verbosity($this->conexion, PGSQL_ERRORS_VERBOSE);
		pg_send_query($this->conexion, $sqls);
		for ($i = 0; $i <= $numsqls; $i++) {
			$this->query = pg_get_result($this->conexion);
			$this->error = pg_result_error($this->query);
			if ($this->error != "") {
				return false;
			}
		}
	}

	// Trae resultado de una query asincrónica
	function traerResultadoQueryAsincrono()
	{
		$this->query = pg_get_result($this->conexion);
	}

	// Trae error de query asincrónica
	function traerErrorQueryAsincrono()
	{
		return $this->error;
	}

	// Devuelve un registro como array
	function traerRegistro($i)
	{
		return pg_fetch_array($this->query, $i);
	}

	// Devuelve todos los registros
	function traerRegistros()
	{
		return pg_fetch_all($this->query);
	}

	// Devuelve un registro como objeto
	function traerObjeto($i)
	{
		return pg_fetch_object($this->query, $i);
	}

	// Número de registros afectados
	function traerRegistrosAfectados()
	{
		return pg_affected_rows($this->query);
	}

	// Número de registros en la consulta
	function contarNumeroRegistros()
	{
		return pg_num_rows($this->query);
	}

	// Devuelve valor de un campo específico
	function traerCampo($rs, $numero, $campo)
	{
		return pg_fetch_result($rs, $numero, $campo);
	}

	// Devuelve el recurso de la consulta
	function traerQuery()
	{
		return $this->query;
	}
}
?>