<?php
  include('../../clases/BD.php');
  include('../../clases/Auto.php');
  include('../../clases/Custodio.php');

  $obj_Auto = new Auto();
  $arr_auto = $obj_Auto->buscarTodos();

  $obj_Custodio = new Custodio();
  $arr_custodio = $obj_Custodio->buscarTodos();

  if (isset($_POST['id'])) {
    $obj_Auto = new Auto();
    $auto = $obj_Auto->buscarAuto($_POST['id']);
  }
?>

<section id="formulario" class="mt-5 mb-5"> 
  <div class="container">
    <form id="form_auto" name="form_auto" enctype="multipart/form-data" method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Auto</h3>

        <!-- Marca -->
        <div class="col-12">
          <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo isset($auto)?$auto->auto_marca:""; ?>">
          </div>
        </div>

        <!-- Tipo -->
        <div class="col-12">
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo isset($auto)?$auto->auto_tipo:""; ?>">
          </div>
        </div>

        <!-- Color -->
        <div class="col-12">
          <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="<?php echo isset($auto)?$auto->auto_color:""; ?>">
          </div>
        </div>

        <!-- Año -->
        <div class="col-12">
          <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="text" class="form-control" maxlength="4" id="anio" name="anio" value="<?php echo isset($auto)?$auto->auto_anio:""; ?>">
          </div>
        </div>

        <!-- Placa -->
        <div class="col-12">
          <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" class="form-control" maxlength="8" id="placa" name="placa" value="<?php echo isset($auto)?$auto->auto_placa:""; ?>">
          </div>
        </div>

        <!-- Percance -->
        <div class="col-12">
          <div class="mb-3">
            <label for="percance" class="form-label">Percance</label>
            <textarea class="form-control" id="percance" name="percance" rows="3"><?php echo isset($auto)?$auto->auto_percance:""; ?></textarea>
          </div>
        </div>

        <!-- Disponibilidad -->
        <div class="col-12">
          <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <select class="form-select" id="disponibilidad" name="disponibilidad">
              <option selected value="">Selecciona</option>
              <option value="Si" <?php if(isset($auto) && $auto->auto_disponibilidad == 'Si') echo "selected"; ?>>Sí</option>
              <option value="No" <?php if(isset($auto) && $auto->auto_disponibilidad == 'No') echo "selected"; ?>>No</option>
            </select>
          </div>
        </div>

        <!-- Custodio -->
        <div class="col-12">
          <div class="mb-3">
            <label for="custodio_id" class="form-label">ID del custodio</label>
            <select class="form-select" id="custodio_id" name="custodio_id" required>
              <option value="">Seleccione un custodio</option>
              <?php foreach ($arr_custodio as $custodio) { ?>
                      <option value="<?php echo $custodio['custodio_id']; ?>" <?php if(isset($auto)) { if ($auto->auto_custodio_id == $custodio['custodio_id']) { ?> selected <?php } }?>>
              <?php echo $custodio['custodio_nombre']; ?>
                      </option>

               <?php } ?>
            </select>
          </div>
        </div>

        <!-- Botón -->
        <div class="col-12">
          <div class="mb-3">
            <?php if (isset($_POST['CRUD'])) { ?>
              <?php if ($_POST['CRUD'] == 1) { ?>
                <button id="btn-actualizar-auto" type="button" class="btn btn-success btn-footer">Actualizar</button> 
                <input type="hidden" name="dml" value="update"/>
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>              
              <?php } ?>
            <?php } else { ?>
              <button type="button" class="btn btn-dark" id="btn-agregar-auto">Enviar</button>
              <input type="hidden" name="dml" value="insert"/>
            <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>

<script src="../sistema/autos/autos.js"></script>