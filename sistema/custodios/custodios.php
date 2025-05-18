<?php
  include('../../clases/BD.php');
  include('../../clases/Custodio.php');

  $obj_Custodio = new Custodio();
  $arr_custodio = $obj_Custodio->buscarTodos();
?>

<section id="tabla-custodios" class="mt-5 mb-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col">
        <h3>Gestión de Custodios</h3>
      </div>
      <div class="col text-end">
        <button type="button" class="btn btn-dark" id="btn-registrar-custodio">Agregar Custodio</button>
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>CURP</th>
              <th>RFC</th>
              <th>Teléfono</th>
              <th>Calle</th>
              <th>No. Exterior</th>
              <th>No. Interior</th>
              <th>Código Postal</th>
              <th>Colonia</th>
              <th>Estado</th>
              <th>Años Experiencia</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($arr_custodio as $custodio) { ?>
              <tr>
                <td><?php echo $custodio['custodio_id']; ?></td>
                <td><?php echo $custodio['custodio_nombre']; ?></td>
                <td><?php echo $custodio['custodio_apellido_paterno']; ?></td>
                <td><?php echo $custodio['custodio_apellido_materno']; ?></td>
                <td><?php echo $custodio['custodio_curp']; ?></td>
                <td><?php echo $custodio['custodio_rfc']; ?></td>
                <td><?php echo $custodio['custodio_telefono']; ?></td>
                <td><?php echo $custodio['custodio_calle']; ?></td>
                <td><?php echo $custodio['custodio_numero_exterior']; ?></td>
                <td><?php echo $custodio['custodio_numero_interior']; ?></td>
                <td><?php echo $custodio['custodio_codigo_postal']; ?></td>
                <td><?php echo $custodio['custodio_colonia']; ?></td>
                <td><?php echo $custodio['custodio_estado']; ?></td>
                <td><?php echo $custodio['custodio_anios_experiencia']; ?></td>
                <td>
                  <p><a class="btn btn-dark btn-table" onclick="actualizarCustodio(<?php echo $custodio['custodio_id']; ?>)">Editar</a></p>
                  <p><a class="btn btn-dark btn-table" onclick="eliminarCustodio(<?php echo $custodio['custodio_id']; ?>)">Eliminar</a></p>
                  <p><a class="btn btn-dark btn-table" onclick="consultarCustodio(<?php echo $custodio['custodio_id']; ?>)">Detalle</a></p>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script src="../sistema/custodios/custodios.js"></script>
