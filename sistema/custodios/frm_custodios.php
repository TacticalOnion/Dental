<?php
  include('../../clases/BD.php');
  include('../../clases/Custodio.php');

  $obj_Custodio = new Custodio();

  if (isset($_POST['id'])) {
    $custodio = $obj_Custodio->buscarCustodio($_POST['id']);
  }
?>

<section id="formulario_custodio" class="mt-5 mb-5">
  <div class="container">
    <form id="form_custodio" name="form_custodio" method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Custodio</h3>

        <!-- Nombre -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($custodio)?$custodio->custodio_nombre:""; ?>" required>
          </div>
        </div>

        <!-- Apellido Paterno -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo isset($custodio)?$custodio->custodio_apellido_paterno:""; ?>" required>
          </div>
        </div>

        <!-- Apellido Materno -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="apellido_materno" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?php echo isset($custodio)?$custodio->custodio_apellido_materno:""; ?>">
          </div>
        </div>

        <!-- CURP -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="curp" class="form-label">CURP</label>
            <input type="text" class="form-control" maxlength="15" id="curp" name="curp" value="<?php echo isset($custodio)?$custodio->custodio_curp:""; ?>" required>
          </div>
        </div>

        <!-- RFC -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="rfc" class="form-label">RFC</label>
            <input type="text" class="form-control" maxlength="12" id="rfc" name="rfc" value="<?php echo isset($custodio)?$custodio->custodio_rfc:""; ?>" required>
          </div>
        </div>

        <!-- Teléfono -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" maxlength="11" id="telefono" name="telefono" value="<?php echo isset($custodio)?$custodio->custodio_telefono:""; ?>" required>
          </div>
        </div>

        <!-- Calle -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="calle" class="form-label">Calle</label>
            <input type="text" class="form-control" id="calle" name="calle" value="<?php echo isset($custodio)?$custodio->custodio_calle:""; ?>" required>
          </div>
        </div>

        <!-- Número Exterior -->
        <div class="col-md-3">
          <div class="mb-3">
            <label for="numero_exterior" class="form-label">Número Exterior</label>
            <input type="text" class="form-control" maxlength="8" id="numero_exterior" name="numero_exterior" value="<?php echo isset($custodio)?$custodio->custodio_numero_exterior:""; ?>" required>
          </div>
        </div>

        <!-- Número Interior -->
        <div class="col-md-3">
          <div class="mb-3">
            <label for="numero_interior" class="form-label">Número Interior</label>
            <input type="text" class="form-control" maxlength="8" id="numero_interior" name="numero_interior" value="<?php echo isset($custodio)?$custodio->custodio_numero_interior:""; ?>">
          </div>
        </div>

        <!-- Código Postal -->
        <div class="col-md-3">
          <div class="mb-3">
            <label for="codigo_postal" class="form-label">Código Postal</label>
            <input type="text" class="form-control" maxlength="5" id="codigo_postal" name="codigo_postal" value="<?php echo isset($custodio)?$custodio->custodio_codigo_postal:""; ?>" required>
          </div>
        </div>

        <!-- Colonia -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="colonia" class="form-label">Colonia</label>
            <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo isset($custodio)?$custodio->custodio_colonia:""; ?>" required>
          </div>
        </div>

        <!-- Estado -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo isset($custodio)?$custodio->custodio_estado:""; ?>" required>
          </div>
        </div>

        <!-- Años de experiencia -->
        <div class="col-md-3">
          <div class="mb-3">
            <label for="anios_experiencia" class="form-label">Años de experiencia</label>
            <input type="text" class="form-control" maxlength="3" id="anios_experiencia" name="anios_experiencia" value="<?php echo isset($custodio)?$custodio->custodio_anios_experiencia:""; ?>">
          </div>
        </div>

        <!-- Botón -->
        <div class="col-12">
          <div class="mb-3">
            <?php if (isset($_POST['CRUD']) && $_POST['CRUD'] == 1) { ?>
              <button id="btn-actualizar-custodio" type="button" class="btn btn-success">Actualizar</button>
              <input type="hidden" name="dml" value="update"/>
              <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
            <?php } else { ?>
              <button type="button" class="btn btn-dark" id="btn-agregar-custodio">Enviar</button>
              <input type="hidden" name="dml" value="insert"/>
            <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>

<script src="../sistema/custodios/custodios.js"></script>
