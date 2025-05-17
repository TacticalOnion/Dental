<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SICENAPYME">
    <meta name="author" content="">

    <!-- Título de la página -->
    <title>Inicio de sesión</title>

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
    <link href="recursos/css/style.css" rel="stylesheet" type="text/css">

    
  </head>

  <!-- Card de login -->
  <body id="fondo">
    <main>
        <div class="container mt-5 pt-5 pb-5" id="cont-inicio">
          <div class="row">
            <div class="col pt-5 pb-5 center">
              <img src="recursos/img/logo.png" alt="">
            </div>

            <div class="col pt-5">
              <div class="center">
                <h3 class="mb-4" id="titulo-inicio"><b>Administrador DentalHealth</b></h3>
              </div>
              

             <form name="frm_acceso" method='POST' action='modulos/ControlAcceso.php'>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Usuario</label>
                  <input type="text" name="strUsuario" id="strUsuario" class="form-control" placeholder="Usuario" required="required" autofocus="autofocus">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                  <input type="password" name="strContrasena" id="strContrasena" class="form-control" placeholder="Contraseña" required="required">
                </div>

                 <div class="form-group" style="text-align: center;">
                <input type="checkbox" id="ver1" class="ver" onChange="hideOrShowPassword()" />
                <label class="text" style="color:#0C4590">&nbsp;Mostrar contraseña</label>
              </div>


                <button type="submit" class="btn btn-sy01 btn-block btn-primary" id="btn-inicio">Ingresar</button>
              </form>
            </div>
          </div>
        </div>
    </main>



  </body>
  <script src="sistema/login.js"></script>
  <!-- JQuery -->
    <script src="recursos/js/jquery-3.4.1.js"></script>
    <!-- DropItemps -->
    <script src="recursos/js/bootstrap.bundle.js"></script>
    <!-- Alertify -->
    <script src="recursos/alertify/alertify.js"></script>
    <!-- Direcciones del sistema -->
    <script src="sistema/recursos/body.js"></script>
</html>

