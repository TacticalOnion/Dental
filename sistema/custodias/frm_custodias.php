<?php
  include('../../clases/BD.php');
  include('../../clases/Auto.php');
  include('../../clases/Custodio.php');
  include('../../clases/Cliente.php');
  include('../../clases/Ruta.php');

  $obj_Auto = new Auto();
  $arr_auto = $obj_Auto->buscarTodos();

  $obj_Custodio = new Custodio();
  $arr_custodio = $obj_Custodio->buscarTodos();

  $obj_Cliente = new Cliente();
  $arr_cliente = $obj_Cliente->buscarTodos();

  $obj_Ruta = new Ruta();
  $arr_ruta = $obj_Ruta->buscarTodos();

  if (isset($_POST['id'])) {
    $obj_Custodia = new Custodia();
    $custodia = $obj_Custodia->buscarCustodia($_POST['id']);
  }
?>

<section id="formulario" class="mt-5 mb-5"> 
  <div class="container">
    <form id="form_custodia" name="form_custodia" enctype="multipart/form-data" method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Custodia</h3>

        <!-- Nombre -->
        <div class="col-12 mb-3">
          <label for="custodia_nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="custodia_nombre" name="nombre" value="<?php echo isset($custodia)?$custodia->custodia_nombre:""; ?>" required>
        </div>

        <!-- Comentario -->
        <div class="col-12 mb-3">
          <label for="custodia_comentario" class="form-label">Comentario</label>
          <textarea class="form-control" id="custodia_comentario" name="comentario" rows="3" required><?php echo isset($custodia)?$custodia->custodia_comentario:""; ?></textarea>
        </div>

        <!-- Fecha -->
        <div class="col-12 mb-3">
          <label for="custodia_fecha" class="form-label">Fecha</label>
          <input type="date" class="form-control" id="custodia_fecha" name="fecha" value="<?php echo isset($custodia)?$custodia->custodia_fecha:""; ?>" required>
        </div>

        <!-- Custodio -->
        <div class="col-12 mb-3">
          <label for="custodia_custodio_id" class="form-label">Custodio</label>
          <select class="form-select" id="custodia_custodio_id" name="custodio_id" required>
            <option value="">Seleccione un custodio</option>
            <?php foreach ($arr_custodio as $custodio) { ?>
              <option value="<?php echo $custodio['custodio_id']; ?>" <?php if(isset($custodia) && $custodia->custodia_custodio_id == $custodio['custodio_id']) echo "selected"; ?>>
                <?php echo $custodio['custodio_nombre']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <!-- Auto -->
        <div class="col-12 mb-3">
          <label for="custodia_auto_id" class="form-label">Auto</label>
          <select class="form-select" id="custodia_auto_id" name="auto_id" required>
            <option value="">Seleccione un auto</option>
            <?php foreach ($arr_auto as $auto) { ?>
              <option value="<?php echo $auto['auto_id']; ?>" <?php if(isset($custodia) && $custodia->custodia_auto_id == $auto['auto_id']) echo "selected"; ?>>
                <?php echo $auto['auto_marca'] . "-" . $auto['auto_tipo']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <!-- Ruta -->
        <div class="col-12">
          <div class="mb-3">
            <label for="custodia_ruta_id" class="form-label">Ruta</label>
            <select class="form-select" id="custodia_ruta_id" name="ruta_id" required>
              <option value="">Seleccione una ruta</option>
              <?php foreach ($arr_ruta as $ruta) { ?>
                <option value="<?php echo $ruta['ruta_id']; ?>" <?php if(isset($custodia)) { if ($custodia->custodia_ruta_id == $ruta['ruta_id']) { ?> selected <?php } }?>>
                  <?php echo $ruta['ruta_estado_inicial'] . "-" . $ruta['ruta_estado_final']; ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <!-- Cliente -->
        <div class="col-12 mb-3">
          <label for="custodia_cliente_id" class="form-label">Cliente</label>
          <select class="form-select" id="custodia_cliente_id" name="cliente_id" required>
            <option value="">Seleccione un cliente</option>
            <?php foreach ($arr_cliente as $cliente) { ?>
              <option value="<?php echo $cliente['cliente_id']; ?>" <?php if(isset($custodia) && $custodia->custodia_cliente_id == $cliente['cliente_id']) echo "selected"; ?>>
                <?php echo $cliente['cliente_nombre']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <!-- Botón -->
        <div class="col-12">
          <div class="mb-3">
            <?php if (isset($_POST['CRUD'])) { ?>
              <?php if ($_POST['CRUD'] == 1) { ?>
                <button id="btn-actualizar-custodia" type="button" class="btn btn-success">Actualizar</button>
                <input type="hidden" name="dml" value="update"/>
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
              <?php } ?>
            <?php } else { ?>
              <button type="button" class="btn btn-dark" id="btn-agregar-custodia">Enviar</button>
              <input type="hidden" name="dml" value="insert"/>
            <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>

<script src="../sistema/custodias/custodias.js"></script>
