 <?php
    include('../../clases/BD.php');
    include('../../clases/Auto.php');
    include('../../clases/Custodio.php');

    $obj_Auto = new Auto();
    $arr_auto = $obj_Auto->buscarTodos();

    $obj_Custodio = new Custodio();
?>


<section id="tabla-autos" class="mt-5 mb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h3>Gestion de automoviles</h3>
            </div>

            <div class="col center">
                <button type="button" class="btn btn-dark" id="btn-registrar-auto">Agregar automovil</button>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                        <th><b>ID</b></th>
                        <th><b>Marca</b></th>
                        <th><b>Tipo</b></th>
                        <th><b>Color</b></th>
                        <th><b>Año</b></th>
                        <th><b>Placa</b></th>
                        <th><b>Percance</b></th>
                        <th><b>Disponibilidad</b></th>
                        <th><b>Custodio</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arr_auto as $auto) { 
                            $custodio = $obj_Custodio->buscarCustodio($auto['auto_custodio_id']);
                            $custodio_nombre = $custodio ? $custodio->custodio_nombre . ' ' . $custodio->custodio_apellido_paterno : '...';
                        ?>
                        <tr>
                            <td><?php echo $auto['auto_id']; ?></td>
                            <td><?php echo $auto['auto_marca']; ?></td>
                            <td><?php echo $auto['auto_tipo']; ?></td>
                            <td><?php echo $auto['auto_color']; ?></td>
                            <td><?php echo $auto['auto_anio']; ?></td>
                            <td><?php echo $auto['auto_placa']; ?></td>
                            <td><?php echo $auto['auto_percance']; ?></td>
                        <td><?php echo $auto['auto_disponibilidad']; ?></td>
                            <td><?php echo $custodio_nombre; ?></td>
                            <td>
                                <p ><a type="button" class="btn btn-dark btn-table" title="Actualizar" onclick="actualizarAuto(<?php echo $auto['auto_id'] ?>)">Editar</a></p>
                                <p><a type="button" class="btn btn-dark btn-table" title="Eliminar" onclick="eliminarAuto(<?php echo $auto['auto_id'] ?>)">Eliminar</a></p>
                                <p><a type="button" class="btn btn-dark btn-table" title="Actualizar" onclick="consultarAuto(<?php echo $auto['auto_id'] ?>)">Detalle</a></p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script src="../sistema/autos/autos.js"></script>