<?php
  include('../../clases/BD.php'); // Establece la conexión con la BD
  include('../../clases/Custodia.php'); // Llama las funciones de la clase Custodia

  $obj_Custodia = new Custodia();
  $arr_custodia = $obj_Custodia->buscarTodos();
?>

<section id="tabla-custodias" class="mt-5 mb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h3>Gestión de custodias</h3>
            </div>

            <div class="col center">
                <button type="button" class="btn btn-primary" id="btn-registrar-custodia">Agregar custodia</button>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th><b>ID</b></th>
                            <th><b>Nombre</b></th>
                            <th><b>Comentario</b></th>
                            <th><b>Fecha</b></th>
                            <th><b>ID Custodio</b></th>
                            <th><b>ID Auto</b></th>
                            <th><b>ID Ruta</b></th>
                            <th><b>ID Cliente</b></th>
                            <th><b>Acciones</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arr_custodia as $custodia) { ?>
                        <tr>
                            <td><?php echo $custodia['custodia_id']; ?></td>
                            <td><?php echo $custodia['custodia_nombre']; ?></td>
                            <td><?php echo $custodia['custodia_comentario']; ?></td>
                            <td><?php echo $custodia['custodia_fecha']; ?></td>
                            <td><?php echo $custodia['custodia_custodio_id']; ?></td>
                            <td><?php echo $custodia['custodia_auto_id']; ?></td>
                            <td><?php echo $custodia['custodia_ruta_id']; ?></td>
                            <td><?php echo $custodia['custodia_cliente_id']; ?></td>
                            <td>
                                <p><a class="btn btn-primary btn-table" title="Actualizar" onclick="actualizarCustodia(<?php echo $custodia['custodia_id'] ?>)">Editar</a></p>
                                <p><a class="btn btn-primary btn-table" title="Eliminar" onclick="eliminarCustodia(<?php echo $custodia['custodia_id'] ?>)">Eliminar</a></p>
                                <p><a class="btn btn-primary btn-table" title="Consultar" onclick="consultarCustodia(<?php echo $custodia['custodia_id'] ?>)">Detalle</a></p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="../sistema/custodias/custodias.js"></script>
