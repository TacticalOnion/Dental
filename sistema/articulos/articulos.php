 <?php
  include('../../clases/BD.php'); /*Establece la conexion con la BD*/
  include('../../clases/Articulo.php'); /*Llama las funciones de la clase articulos*/

  $obj_Articulo = new Articulo();
  $arr_articulo = $obj_Articulo->buscarTodos();
?>

 <section id="tabla-articulos" class="mt-5 mb-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col">
        <h3>Artículos Dentales</h3>
      </div>

      <div class="col center">
        <button type="button" class="btn btn-dark" id="btn-registro-articulo">Agregar Artículo</button>
      </div>
      
      <div class="table-responsive">
          <table class="table">
              <thead class="table-light">
                <tr>
                  <td><b>#Id</b></td>
                  <td><b>Nombre del artículo</b></td>
                  <td><b>Descripción</b></td>
                  <td><b>Tipo de material</b></td>
                  <td><b>Proveedor</b></td>
                  <td><b>Fecha de registro</b></td>
                  <td><b>Origen</b></td>
                  <td><b>Comentario proveedor</b></td>
                  <td><b>Disponibilidad</b></td>
                  <td><b>Opciones</b></td>
                </tr>
              </thead>
              <tbody>

              	<?php foreach ($arr_articulo as $articulo) { ?>
                <tr>
	                 <td><?php echo $articulo['arti_id_articulo']; ?></td>
	                 <td><?php echo $articulo['arti_nombre']; ?></td>
	                 <td><?php echo $articulo['arti_descrip']; ?></td>
	                 <td><?php echo $articulo['mate_descrip']; ?></td>
	                 <td><?php echo $articulo['prove_descrip']; ?></td>
	                 <td><?php echo $articulo['arti_fecha']; ?></td>
	                 <td><?php echo $articulo['arti_nacionalidad']; ?></td>
                   <td><?php echo $articulo['arti_comentario_proveedor']; ?></td>
	                 <td><?php echo $articulo['arti_disponibilidad']; ?></td>
	                  <td>
	                    <p ><a type="button" class="btn btn-dark btn-table" title="Actualizar" onclick="actualizarArticulo(<?php echo $articulo['arti_id_articulo'] ?>)">Editar</a></p>
	                    <p><a type="button" class="btn btn-dark btn-table" title="Eliminar" onclick="eliminarArticulo(<?php echo $articulo['arti_id_articulo'] ?>, '<?php echo $articulo['arti_nombre'] ?>')">Eliminar</a></p>
	                    <p><a type="button" class="btn btn-dark btn-table" title="Actualizar" onclick="consultarArticulo(<?php echo $articulo['arti_id_articulo'] ?>)">Detalle</a></p>
	                  </td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
      </div>
    </div>  
  </div>
</section>
<script src="../sistema/articulos/articulos.js"></script>