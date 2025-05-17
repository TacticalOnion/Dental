<?php
  class Articulo
  {
    function agregarArticulo($nombProd, $descripcion, $tipoMaterial, $proveedor, $fecha, $nacionalidad,$comentarioProveedor,$disponibilidad)
    {
        $SQL_Ins_Articulo = 
        "INSERT INTO articulos(arti_nombre, arti_descrip, arti_id_material, arti_id_prove, arti_fecha, arti_nacionalidad, arti_comentario_porveedor, arti_disponibilidad)
         VALUES ('$nombProd','$descripcion',$tipoMaterial,$proveedor,'$fecha','$nacionalidad','$comentarioProveedor','$disponibilidad')";

        $bd = new BD(); /*Abrimoos la BD*/
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion); /*Creamos la transaccion*/
        $transaccion_1->enviarQuery($SQL_Ins_Articulo);
        $bd->cerrarBD(); /*Se cierra la BD*/

    }

  
    function eliminarArticulo($articulo)
    {
      $SQL_Eli_Articulo = 
			" DELETE FROM articulos
				WHERE arti_id_articulo = $articulo;
			";

      $bd = new BD();
      $bd->abrirBD();
      $transaccion_1 = new Transaccion($bd->conexion);
      $transaccion_1->enviarQuery($SQL_Eli_Articulo);
      $bd->cerrarBD();
    }

    function buscarTodos()
	  {
      $SQL_Bus_Articulos = 
      "SELECT arti_id_articulo,arti_nombre, 
      arti_descrip, 
      arti_id_material, 
      arti_id_prove, 
      arti_fecha, 
      arti_nacionalidad,
      arti_comentario_proveedor,
      arti_disponibilidad,
      mate_descrip,prove_descrip
              FROM articulos,proveedor,material WHERE prove_id_prove = arti_id_prove
          AND mate_id_material = arti_id_material;
		  ";

		  $bd = new BD();
		  $bd->abrirBD();
		  $transaccion_1 = new Transaccion($bd->conexion);
		  $transaccion_1->enviarQuery($SQL_Bus_Articulos);
		  $bd->cerrarBD();
		  return ($transaccion_1->traerRegistros());
    }


    function modificarArticulo($articulo,$nombProd, $descripcion, $tipoMaterial, $proveedor, $fecha, $nacionalidad,$comentarioProveedor,$disponibilidad)
    {
        $SQL_Act_Articulo = 
        "UPDATE articulos
          SET arti_nombre = '$nombProd', 
          arti_descrip = '$descripcion', 
          arti_id_material = $tipoMaterial, 
          arti_id_prove = $proveedor, 
          arti_fecha = '$fecha', 
          arti_nacionalidad = '$nacionalidad',
          arti_comentario_proveedor = '$comentarioProveedor',
          arti_disponibilidad = '$disponibilidad'
          WHERE arti_id_articulo = $articulo;
        ";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Act_Articulo);
        $bd->cerrarBD();
    }

    function buscarArticulo($intArticulo){

      $SQL_Bus_Articulo = 
      "SELECT arti_id_articulo,arti_nombre, 
      arti_descrip, 
      arti_id_material, 
      arti_id_prove, 
      arti_fecha, 
      arti_nacionalidad,
      arti_comentario_proveedor,
      arti_disponibilidad,
      mate_descrip,prove_descrip,prove_id_prove,mate_id_material
          FROM articulos,proveedor,material where prove_id_prove = arti_id_prove
          AND mate_id_material = arti_id_material AND arti_id_articulo = $intArticulo;
      ";
  
      $bd = new BD();
      $bd->abrirBD();
      $transaccion_1 = new Transaccion($bd->conexion);
      $transaccion_1->enviarQuery($SQL_Bus_Articulo);
      $obj_Curso = $transaccion_1->traerObjeto(0);
      $bd->cerrarBD();
      return ($transaccion_1->traerObjeto(0));
    }
  }
?>