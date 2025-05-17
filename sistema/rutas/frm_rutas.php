<?php
  include('../../clases/BD.php');
  include('../../clases/Ruta.php');
  include('../../clases/Custodio.php');

  $obj_Ruta = new Ruta();
  $arr_ruta = $obj_Ruta->buscarTodos();

  $obj_Custodio = new Custodio();
  $arr_custodio = $obj_Custodio->buscarTodos();

  if (isset($_POST['id'])) {
    $obj_Ruta = new Ruta();
    $ruta = $obj_Ruta->buscarRuta($_POST['id']);
  }
?>

<section id="formulario" class="mt-5 mb-5"> 
  <div class="container">
    <form id="form_ruta" name="form_ruta" method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Ruta</h3>
        <!-- Estado Inicial -->
        <div class="col-12">
          <div class="mb-3">
            <label for="estado_inicial" class="form-label">Estado Inicial</label>
            <input type="text" maxlength="30" class="form-control" id="estado_inicial" name="estado_inicial" value="<?php echo isset($ruta) ? $ruta->ruta_estado_inicial : ""; ?>" required>
          </div>
        </div>

        <!-- Estado Final -->
        <div class="col-12">
          <div class="mb-3">
            <label for="estado_final" class="form-label">Estado Final</label>
            <input type="text" maxlength="30" class="form-control" id="estado_final" name="estado_final" value="<?php echo isset($ruta) ? $ruta->ruta_estado_final : ""; ?>" required>
          </div>
        </div>

        <!-- Pagar Caseta -->
        <div class="col-12">
          <div class="mb-3">
            <label for="pagar_caseta" class="form-label">¿Pagar Caseta?</label>
            <select class="form-select" id="pagar_caseta" name="pagar_caseta" required>
              <option value="" <?php if (!isset($ruta)) echo "selected"; ?>>Selecciona</option>
              <option value="1" <?php if (isset($ruta) && $ruta->ruta_pagar_caseta) echo "selected"; ?>>Sí</option>
              <option value="0" <?php if (isset($ruta) && !$ruta->ruta_pagar_caseta) echo "selected"; ?>>No</option>
            </select>
          </div>
        </div>

        <!-- Costo Caseta -->
        <div class="col-12">
          <div class="mb-3">
            <label for="costo_caseta" class="form-label">Costo Caseta</label>
            <input type="number" step="0.01" class="form-control" id="costo_caseta" name="costo_caseta" value="<?php echo isset($ruta) ? $ruta->ruta_costo_caseta : ""; ?>" required>
          </div>
        </div>

        <!-- Tiempo Aproximado -->
        <div class="col-12">
          <div class="mb-3">
            <label for="tiempo_aproximado" class="form-label">Tiempo Aproximado (HH:MM)</label>
            <input type="text" maxlength="5" pattern="^\d{2}:\d{2}$" class="form-control" id="tiempo_aproximado" name="tiempo_aproximado" value="<?php echo isset($ruta) ? trim($ruta->ruta_tiempo_aproximado) : ""; ?>" required>
          </div>
        </div>

        <!-- Descripción -->
        <div class="col-12">
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" maxlength="150" rows="3" required><?php echo isset($ruta) ? $ruta->ruta_descripcion : ""; ?></textarea>
          </div>
        </div>

        <!-- Botón -->
        <div class="col-12">
          <div class="mb-3">
            <?php if (isset($_POST['CRUD'])) { ?>
              <?php if ($_POST['CRUD'] == 1) { ?>
                <button id="btn-actualizar-ruta" type="button" class="btn btn-success btn-footer">Actualizar</button> 
                <input type="hidden" name="dml" value="update"/>
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>              
              <?php } ?>
            <?php } else { ?>
              <button type="button" class="btn btn-primary" id="btn-agregar-ruta">Enviar</button>
              <input type="hidden" name="dml" value="insert"/>
            <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>

<script src="../sistema/rutas/rutas.js"></script>
