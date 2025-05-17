<?php
  class Proveedor
  {
    function buscarTodos(){
      $SQL_Bus_Proveedor = 
      "SELECT * FROM PROVEEDOR";

		  $bd = new BD();
		  $bd->abrirBD();
		  $transaccion_1 = new Transaccion($bd->conexion);
		  $transaccion_1->enviarQuery($SQL_Bus_Proveedor);
		  $bd->cerrarBD();
		  return ($transaccion_1->traerRegistros());
    }

   
  }
?>