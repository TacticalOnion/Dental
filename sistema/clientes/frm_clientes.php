<?php
  include('../../clases/BD.php');
  include('../../clases/Cliente.php');

  $obj_Cliente = new Cliente();
  $arr_cliente = $obj_Cliente->buscarTodos();

  if (isset($_POST['id'])) {
    $cliente = $obj_Cliente->buscarCliente($_POST['id']);
  }
?>

<section id="formulario" class="mt-5 mb-5"> 
  <div class="container">
    <form id="form_cliente" name="form_cliente" method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Cliente</h3>

        <!-- Nombre -->
        <div class="col-12">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="150" value="<?php echo isset($cliente)?$cliente->cliente_nombre:""; ?>" required>
          </div>
        </div>

        <!-- Empresa -->
        <div class="col-12">
          <div class="mb-3">
            <label for="empresa" class="form-label">Empresa</label>
            <input type="text" class="form-control" id="empresa" name="empresa" maxlength="100" value="<?php echo isset($cliente)?$cliente->cliente_empresa:""; ?>" required>
          </div>
        </div>

        <!-- Teléfono -->
        <div class="col-12">
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" maxlength="11" value="<?php echo isset($cliente)?$cliente->cliente_telefono:""; ?>" required>
          </div>
        </div>

        <!-- Correo -->
        <div class="col-12">
          <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" maxlength="100" value="<?php echo isset($cliente)?$cliente->cliente_correo:""; ?>" required>
          </div>
        </div>

        <!-- Comentarios -->
        <div class="col-12">
          <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios</label>
            <textarea class="form-control" id="comentarios" name="comentarios" maxlength="150" rows="3" required><?php echo isset($cliente)?$cliente->cliente_comentarios:""; ?></textarea>
          </div>
        </div>

        <!-- Botón -->
        <div class="col-12">
          <div class="mb-3">
            <?php if (isset($_POST['CRUD']) && $_POST['CRUD'] == 1) { ?>
              <button id="btn-actualizar-cliente" type="button" class="btn btn-success btn-footer">Actualizar</button> 
              <input type="hidden" name="dml" value="update"/>
              <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>              
            <?php } else { ?>
              <button type="button" class="btn btn-dark" id="btn-agregar-cliente">Enviar</button>
              <input type="hidden" name="dml" value="insert"/>
            <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>

<script src="../sistema/clientes/clientes.js"></script>
