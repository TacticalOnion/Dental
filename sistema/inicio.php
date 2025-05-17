<?php
  error_reporting(0);
  include('../clases/Cuenta.php');
  $obj_Cuenta = new Cuenta();
  $cuenta = $obj_Cuenta->buscarUsuarioSistema($_strUsuario, $_strContrasena);
?>

<!-- Archivo para cargar el header y referencias -->
<?php include_once '../sistema/recursos/header.php'; ?>

<main>
  <!-- Aquí se cargarán los contenidos -->
  <section id="container">
    <?php include_once '../sistema/inicio/frm_inicio_reportes.php'; ?>
  </section>
</main>

<!-- Archivo para cargar el footer y los scripts -->
<?php include_once '../sistema/recursos/footer.php'; ?>

