<?php 
  include('../../clases/BD.php'); // Establece la conexión con la BD
  include('../../clases/Cliente.php'); // Llama las funciones de la clase cliente

  $obj_Cliente = new Cliente();
  $arr_cliente = $obj_Cliente->buscarTodos();
?>

<section id="tabla-clientes" class="mt-5 mb-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col">
        <h3>Gestión de clientes</h3>
      </div>

      <div class="col center">
        <button type="button" class="btn btn-primary" id="btn-registrar-cliente">Agregar cliente</button>
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th><b>ID</b></th>
              <th><b>Nombre</b></th>
              <th><b>Empresa</b></th>
              <th><b>Teléfono</b></th>
              <th><b>Correo</b></th>
              <th><b>Comentarios</b></th>
              <th><b>Acciones</b></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($arr_cliente as $cliente) { ?>
              <tr>
                <td><?php echo $cliente['cliente_id']; ?></td>
                <td><?php echo $cliente['cliente_nombre']; ?></td>
                <td><?php echo $cliente['cliente_empresa']; ?></td>
                <td><?php echo $cliente['cliente_telefono']; ?></td>
                <td><?php echo $cliente['cliente_correo']; ?></td>
                <td><?php echo $cliente['cliente_comentarios']; ?></td>
                <td>
                  <p><a type="button" class="btn btn-primary btn-table" title="Actualizar" onclick="actualizarCliente(<?php echo $cliente['cliente_id']; ?>)">Editar</a></p>
                  <p><a type="button" class="btn btn-primary btn-table" title="Eliminar" onclick="eliminarCliente(<?php echo $cliente['cliente_id']; ?>)">Eliminar</a></p>
                  <p><a type="button" class="btn btn-primary btn-table" title="Detalle" onclick="consultarCliente(<?php echo $cliente['cliente_id']; ?>)">Detalle</a></p>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script src="../sistema/clientes/clientes.js"></script>
