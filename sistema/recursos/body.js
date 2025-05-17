// Rutas
$(document).ready(function () {
  $(document).on("click", "#btn_inicio", function () {
    $("#container").load("../sistema/inicio/frm_inicio_reportes.php");
  });

  $(document).on("click", "#btn_autos", function () {
    $("#container").load("../sistema/autos/autos.php");
  });

  $("#btn_clientes").on("click", function () {
    $("#container").load("../sistema/clientes/clientes.php");
  });

  $(document).on("click", "#btn_custodias", function () {
    $("#container").load("../sistema/custodias/custodias.php");
  });

  $(document).on("click", "#btn_custodios", function () {
    $("#container").load("../sistema/custodios/custodios.php");
  });

  $(document).on("click", "#btn_rutas", function () {
    $("#container").load("../sistema/rutas/rutas.php");
  });
});

// $(document).ready(function () {
//   $("#btn_inicio").click(function () {
//     $("#container").load("../sistema/inicio/frm_inicio_reportes.php");
//   });

//   $("#btn_autos").click(function () {
//     $("#container").load("../sistema/autos/autos.php");
//   });

//   $("#btn_clientes").click(function () {
//     $("#container").load("../sistema/clientes/clientes.php");
//   });

//   $("#btn_custodias").click(function () {
//     $("#container").load("../sistema/custodias/custodias.php");
//   });

//   $("#btn_custodios").click(function () {
//     $("#container").load("../sistema/custodios/custodios.php");
//   });

//   $("#btn_rutas").click(function () {
//     $("#container").load("../sistema/rutas/rutas.php");
//   });
// });
