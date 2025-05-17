<?php
  include('../../clases/BD.php');
  include('../../clases/Proveedor.php');
  include('../../clases/Material.php');
  include('../../clases/Articulo.php');

  $obj_Proveedor = new Proveedor();
  $arr_proveedor = $obj_Proveedor->buscarTodos();

  $obj_Material = new Material();
  $arr_material = $obj_Material->buscarTodos();

  if (isset($_POST['id'])) {
    $obj_Articulo = new Articulo();
    $articulo = $obj_Articulo->buscarArticulo($_POST['id']);
  }

?>

<section id="formulario" class="mt-5 mb-5">
  <div class="container">
    <form id="form_articulo" name="form_articulo" enctype='multipart/form-data' method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Artículos Dentales</h3>
        <div class="col-12">
          <div class="mb-3">
            <label for="nombProd" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="nombProd" name=
            "nombProd" value="<?php echo isset($articulo)?$articulo->arti_nombre:"";?>">
          </div>
        </div>

        <div class="col-12">
          <div class="mb-3">
             <label for="descripcion" class="form-label">Descripción</label>
             <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value="<?php echo isset($articulo)?$articulo->arti_descrip:"";?>"><?php echo isset($articulo)?$articulo->arti_descrip:"";?></textarea>
          </div>
        </div>


        <div class="col-12">
          <div class="mb-3">
            <label for="tipoMaterial" class="form-label">Tipo de material</label>
            <select class="form-select" aria-label="Default select example" id="tipoMaterial" name="tipoMaterial">
              <option selected value="0">Selecciona</option>
              <?php foreach ($arr_material as $material) { ?>
                      <option value="<?php echo $material['mate_id_material']; ?>" <?php if(isset($articulo)) { if ($articulo->prove_id_prove == $material['mate_id_material']) { ?> selected <?php } }?>>
              <?php echo $material['mate_descrip']; ?>
                      </option>

               <?php } ?>
            </select>
          </div>
        </div>

         <div class="col-12">
          <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <select class="form-select" aria-label="Default select example" id="proveedor" name="proveedor">
              <option selected value="0">Selecciona</option>
              <?php foreach ($arr_proveedor as $proveedor) { ?>
                      <option value="<?php echo $proveedor['prove_id_prove']; ?>" <?php if(isset($articulo)) { if ($articulo->prove_id_prove == $proveedor['prove_id_prove']) { ?> selected <?php } }?>>
              <?php echo $proveedor['prove_descrip']; ?>
                      </option>

               <?php } ?>
            </select>
          </div>
        </div>

        
        <div class="col-12">
            <div class="mb-3">
               <label for="fecha" class="form-label">Fecha de registro</label>
               <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo isset($articulo)?$articulo->arti_fecha:"";?>">
            </div>
        </div>


          <div class="col-12">
            <div class="mb-3">
               <div class="form-check">
                <input class="form-check-input" type="radio" name="nacionalidad" id="nacional" <?php if(isset($articulo)) { if ($articulo->arti_nacionalidad == "nacional") { ?> checked <?php }}?> value="nacional">
                <label class="form-check-label" for="nacionalidad">
                  Nacional
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="nacionalidad" id="nacionalidad" value="ext" <?php if(isset($articulo)) { if ($articulo->arti_nacionalidad == "ext") { ?> checked <?php }}?>>
                <label class="form-check-label" for="nacionalidad">
                  Extranjero
                </label>
              </div>
            </div>
        </div>
        
        <div class="col-12">
          <div class="mb-3">
             <label for="comentarioProveedor" class="form-label">Comentario proveedor</label>
             <textarea class="form-control" id="comentarioProveedor" name="comentarioProveedor" rows="3"  value="<?php echo isset($articulo)?$articulo->arti_comentario_porveedor:"";?>"><?php echo isset($articulo)?$articulo->arti_comentario_porveedor:"";?></textarea>
          </div>
        </div>

        <div class="col-12">
          <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <select class="form-select" aria-label="Default select example" id="disponibilidad" name="disponibilidad">
              <option selected value="">Selecciona</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>

         <div class="col-12">
          <div class="mb-3">

        <?php if (isset($_POST['CRUD'])) { ?>
          <?php if ($_POST['CRUD'] == 1) { ?>
            <button id="btn-actualizar-articulo" type="button" class="btn btn-success btn-footer">Actualizar</button> 
            <input type="hidden" name="dml" value="update"/>
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>              
          <?php } ?>
           <?php }else{ ?>
            <button type="button" class="btn btn-primary" id="btn-agregar-articulo">Enviar</button>
            <input type="hidden" name="dml" value="insert"/>
             <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>
<script src="../sistema/articulos/articulos.js"></script>
