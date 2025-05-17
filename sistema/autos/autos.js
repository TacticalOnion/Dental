$(document).ready(function () {
  $("#btn-registrar-auto").click(function () {
    $("#container").load("../sistema/autos/frm_autos.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioAuto() {
  if ($("#marca").val() == "") {
    alertify.error("Debe ingresar la marca del auto");
    $("#marca").focus();
    return false;
  }

  if ($("#tipo").val() == "") {
    alertify.error("Debe ingresar el tipo de auto");
    $("#tipo").focus();
    return false;
  }

  if ($("#color").val() == "") {
    alertify.error("Debe ingresar el color del auto");
    $("#color").focus();
    return false;
  }

  if ($("#anio").val() == "") {
    alertify.error("Debe ingresar el año del auto");
    $("#anio").focus();
    return false;
  }

  if ($("#placa").val() == "") {
    alertify.error("Debe ingresar la placa del auto");
    $("#placa").focus();
    return false;
  }

  if ($("#disponibilidad").val() == "") {
    alertify.error("Debe seleccionar la disponibilidad del auto");
    $("#disponibilidad").focus();
    return false;
  }

  if ($("#custodio").val() == "0") {
    alertify.error("Debe seleccionar un custodio");
    $("#custodio").focus();
    return false;
  }

  return true;
}

// Registrar auto
$("#btn-agregar-auto").click(function () {
  if (validarFormularioAuto()) {
    var parametros = new FormData($("#form_auto")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Auto.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        if (response == 1) {
          alertify.success("El auto se registró correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/autos/autos.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al registrar el auto");
        }
      }
    });
  }
});

// Actualizar auto
$(document).ready(function () {
  $("#btn-actualizar-auto").click(function () {
    var parametros = new FormData($("#form_auto")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Auto.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta == 1) {
          alertify.success("El auto se actualizó correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/autos/autos.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al actualizar el auto");
        }
      }
    });
    return false;
  });
});

// Eliminar auto
function eliminarAuto(id, descripcion) {
  alertify.confirm(
    "Eliminar Auto",
    `¿Está seguro de eliminar el auto <b>${descripcion}</b>?`,
    function () {
      $.ajax({
        data: { id: id, dml: "delete" },
        type: "POST",
        url: "../modulos/Control_Auto.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente el auto");
            setTimeout(function () {
              $("#container").load("../sistema/autos/autos.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar el auto");
          }
        }
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar auto
function consultarAuto(id) {
  $.ajax({
    data: { id: id, CRUD: 0 },
    type: "POST",
    url: "../sistema/autos/frm_autos.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}

// Mostrar formulario para actualizar auto
function actualizarAuto(id) {
  $.ajax({
    data: { id: id, CRUD: 1 },
    type: "POST",
    url: "../sistema/autos/frm_autos.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}
