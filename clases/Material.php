<?php
  class Material
  {
    function buscarTodos(){
      $SQL_Bus_Material = 
      "SELECT * FROM MATERIAL";

		  $bd = new BD();
		  $bd->abrirBD();
		  $transaccion_1 = new Transaccion($bd->conexion);
		  $transaccion_1->enviarQuery($SQL_Bus_Material);
		  $bd->cerrarBD();
		  return ($transaccion_1->traerRegistros());
    }

   
  }
?>