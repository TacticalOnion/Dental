<?php
    include('../../clases/BD.php');
    include('../../clases/Custodia.php');
    include('../../clases/Custodio.php');
    include('../../clases/Auto.php');
    include('../../clases/Ruta.php');
    include('../../clases/Cliente.php');

    $obj_Custodia = new Custodia();
    $arr_custodia = $obj_Custodia->buscarTodos();

    $obj_Custodio = new Custodio();
    $obj_Auto = new Auto();
    $obj_Ruta = new Ruta();
    $obj_Cliente = new Cliente();

?>

<section id="tabla-custodias" class="mt-5 mb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h3>Gestión de custodias</h3>
            </div>

            <div class="col center">
                <button type="button" class="btn btn-dark" id="btn-registrar-custodia">Agregar custodia</button>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th><b>ID</b></th>
                            <th><b>Nombre</b></th>
                            <th><b>Comentario</b></th>
                            <th><b>Fecha</b></th>
                            <th><b>Custodio</b></th>
                            <th><b>Auto</b></th>
                            <th><b>Ruta</b></th>
                            <th><b>Cliente</b></th>
                            <th><b>Acciones</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arr_custodia as $custodia) { 
                            $custodio = $obj_Custodio->buscarCustodio($custodia['custodia_custodio_id']);
                            $custodio_nombre = $custodio ? $custodio->custodio_nombre . ' ' . $custodio->custodio_apellido_paterno : '...';

                            $auto = $obj_Auto->buscarAuto($custodia['custodia_auto_id']);
                            $auto_nombre = $auto ? $auto->auto_marca . ' ' . $auto->auto_tipo : '...';

                            $ruta = $obj_Ruta->buscarRuta($custodia['custodia_ruta_id']);
                            $ruta_nombre = $ruta ? $ruta->ruta_estado_inicial . ' ' . $ruta->ruta_estado_final : '...';

                            $cliente = $obj_Cliente->buscarCliente($custodia['custodia_cliente_id']);
                            $cliente_nombre = $cliente ? $cliente->cliente_empresa . '-' . $cliente->cliente_nombre : '...';
                        ?>
                        <tr>
                            <td><?php echo $custodia['custodia_id']; ?></td>
                            <td><?php echo $custodia['custodia_nombre']; ?></td>
                            <td><?php echo $custodia['custodia_comentario']; ?></td>
                            <td><?php echo $custodia['custodia_fecha']; ?></td>
                            <td><?php echo $custodio_nombre; ?></td>
                            <td><?php echo $auto_nombre; ?></td>
                            <td><?php echo $ruta_nombre; ?></td>
                            <td><?php echo $cliente_nombre; ?></td>
                            <td>
                                <p><a class="btn btn-dark btn-table" title="Actualizar" onclick="actualizarCustodia(<?php echo $custodia['custodia_id'] ?>)">Editar</a></p>
                                <p><a class="btn btn-dark btn-table" title="Eliminar" onclick="eliminarCustodia(<?php echo $custodia['custodia_id'] ?>)">Eliminar</a></p>
                                <p><a class="btn btn-dark btn-table" title="Consultar" onclick="consultarCustodia(<?php echo $custodia['custodia_id'] ?>)">Detalle</a></p>
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
