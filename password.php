<?php 
  include('clases/BD.php'); 
  include('clases/Busqueda.php');
  $obj_Busqueda = new Busqueda();
  $arr_preguntas = $obj_Busqueda->selectPregunta();
?>
<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SICENAPYME">
    <meta name="author" content="">

    <!-- Título de la página -->
    <title>Restablecer contraseña</title>

    <!-- Referencias -->

    <!-- Iconos -->
    <link href="recursos/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Icono de la pestaña -->
    <link rel="recursos/shortcut icon" href="recursos/favicon.ico"/>
    <!-- Alertify -->
    <link rel="stylesheet" type="text/css" href="recursos/alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="recursos/alertify/css/alertify.rtl.css">
    <link rel="stylesheet" type="text/css" href="recursos/alertify/css/themes/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="recursos/alertify/css/themes/bootstrap.rtl.css">
    <!-- Bootstrap 4 -->
    <link href="recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="recursos/css/bootstrap.css.map" rel="stylesheet" type="text/css">
    <link href="recursos/css/sb-admin.css" rel="stylesheet" type="text/css">
    <link href="recursos/css/sicenapyme.css" rel="stylesheet" type="text/css">

    <!-- JQuery -->
    <script src="recursos/js/jquery-3.4.1.js"></script>
    <!-- DropItemps -->
    <script src="recursos/js/bootstrap.bundle.js"></script>
    <!-- Alertify -->
    <script src="recursos/alertify/alertify.js"></script>
    <!-- Direcciones del sistema -->
    <script src="sistema/recursos/body.js"></script>
  </head>

  <!-- Card de login -->
  <body style="background-image: url('recursos/imagenes/background.png');">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header bg-blue">
          <b style="color: white">&nbsp; Administración</b>
          <img align="right" src="recursos/imagenes/cuadros.png" alt="Usuario" width="125" height="20">
        </div>
        <div class="card-body">
          <div class="col-lg-12 form-row" style="margin-top: 10px;">
            <form name="form_usuario" id="form_usuario" method="POST">
              <div class="form-group">
                <div class="form-label-group" align="center">
                  <img src="recursos/imagenes/LogoCenapymeNegro.png" width="80%" height="100%">
                </div>
              </div>
              <hr>
              <div class="form-group" align="center">
                <label style="color: #545454;"><b>Restablecer tu contraseña</b></label>
              </div>
                <div class="col-lg-12 form-group">
                  <label for="strNombreUsuario" style="color:#0C4590"><b>Tu nombre de usuario: *</b></label>
                  <input type="text" class="form-control" id="strNombreUsuario" name="strNombreUsuario" value="<?php echo isset($usuario) ? $usuario->usua_nombre : ""; ?>">
                </div>
                <div class="col-lg-12 form-group">
                  <label for="UsuarioPregunta" style="color:#0C4590"><b>¿Cuál fue tu pregunta de seguridad?</b></label>
                  <select class="custom-select" id="UsuarioPregunta" name="UsuarioPregunta">
                    <option value="0">Seleccione una pregunta</option>
                    <?php foreach ($arr_preguntas as $pregunta) { ?>
                      <option value="<?php echo $pregunta['preg_id_preg']; ?>"><?php echo $pregunta['preg_nombre']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-lg-12 form-group">
                  <label for="UsuarioRespuesta" style="color:#0C4590"><b>Proporcione la respuesta: *</b></label>
                  <input type="text" class="form-control" id="UsuarioRespuesta" name="UsuarioRespuesta" placeholder="">
                </div>
                <input type="hidden" name="dml" value="reset"/>
                <div class="col-12 text-center">
                  <button id="btn-restablecer-usuario" type="submit" class="btn btn-sy01" id="btn-inicio">Restablecer contraseña</button>
                </div>
                <div class="col-12 text-center">
                  <a href="index.php">
                      <button type="button" class="btn btn-primary btn-footer">Regresar</button>
                  </a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="sistema/login.js"></script>
</html>