<?php
  include('../../clases/BD.php');
  include('../../clases/Ruta.php');

  $obj_Ruta = new Ruta();
  $arr_ruta = $obj_Ruta->buscarTodos();
?>


<section id="tabla-rutas" class="mt-5 mb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h3>Gestión de Rutas</h3>
            </div>

            <div class="col center">
                <button type="button" class="btn btn-dark" id="btn-registrar-ruta">Agregar ruta</button>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th><b>ID</b></th>
                            <th><b>Estado Inicial</b></th>
                            <th><b>Estado Final</b></th>
                            <th><b>Pagar Caseta</b></th>
                            <th><b>Costo Caseta</b></th>
                            <th><b>Tiempo Aproximado</b></th>
                            <th><b>Descripción</b></th>
                            <th><b>Acciones</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arr_ruta as $ruta) { ?>
                        <tr>
                            <td><?php echo $ruta['ruta_id']; ?></td>
                            <td><?php echo htmlspecialchars($ruta['ruta_estado_inicial']); ?></td>
                            <td><?php echo htmlspecialchars($ruta['ruta_estado_final']); ?></td>
                            <td><?php echo $ruta['ruta_pagar_caseta'] ? 'Sí' : 'No'; ?></td>
                            <td><?php echo number_format($ruta['ruta_costo_caseta'], 2); ?></td>
                            <td><?php echo htmlspecialchars($ruta['ruta_tiempo_aproximado']); ?></td>
                            <td><?php echo htmlspecialchars($ruta['ruta_descripcion']); ?></td>
                            <td>
                                <p><a type="button" class="btn btn-dark btn-table" title="Actualizar" onclick="actualizarRuta(<?php echo $ruta['ruta_id']; ?>)">Editar</a></p>
                                <p><a type="button" class="btn btn-dark btn-table" title="Eliminar" onclick="eliminarRuta(<?php echo $ruta['ruta_id']; ?>)">Eliminar</a></p>
                                <p><a type="button" class="btn btn-dark btn-table" title="Detalle" onclick="consultarRuta(<?php echo $ruta['ruta_id']; ?>)">Detalle</a></p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script src="../sistema/rutas/rutas.js"></script>
