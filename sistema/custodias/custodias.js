$(document).ready(function () {
  $("#btn-registrar-custodia").click(function () {
    $("#container").load("../sistema/custodias/frm_custodias.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioCustodia() {
  if ($("#nombre").val() == "") {
    alertify.error("Debe ingresar el nombre de la custodia");
    $("#nombre").focus();
    return false;
  }

  if ($("#comentario").val() == "") {
    alertify.error("Debe ingresar un comentario");
    $("#comentario").focus();
    return false;
  }

  if ($("#fecha").val() == "") {
    alertify.error("Debe ingresar la fecha de la custodia");
    $("#fecha").focus();
    return false;
  }

  if ($("#custodio_id").val() == "0") {
    alertify.error("Debe seleccionar un custodio");
    $("#custodio_id").focus();
    return false;
  }

  if ($("#auto_id").val() == "0") {
    alertify.error("Debe seleccionar un auto");
    $("#auto_id").focus();
    return false;
  }

  if ($("#ruta_id").val() == "0") {
    alertify.error("Debe seleccionar una ruta");
    $("#ruta_id").focus();
    return false;
  }

  if ($("#cliente_id").val() == "0") {
    alertify.error("Debe seleccionar un cliente");
    $("#cliente_id").focus();
    return false;
  }

  return true;
}

// Registrar custodia
$("#btn-agregar-custodia").click(function () {
  if (validarFormularioCustodia()) {
    var parametros = new FormData($("#form_custodia")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Custodia.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        if (response == 1) {
          alertify.success("La custodia se registró correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/custodias/custodias.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al registrar la custodia");
        }
      }
    });
  }
});

// Actualizar custodia
$(document).ready(function () {
  $("#btn-actualizar-custodia").click(function () {
    var parametros = new FormData($("#form_custodia")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Custodia.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta == 1) {
          alertify.success("La custodia se actualizó correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/custodias/custodia.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al actualizar la custodia");
        }
      }
    });
    return false;
  });
});

// Eliminar custodia
function eliminarCustodia(id, descripcion) {
  alertify.confirm(
    "Eliminar Custodia",
    `¿Está seguro de eliminar la custodia <b>${descripcion}</b>?`,
    function () {
      $.ajax({
        data: { id: id, dml: "delete" },
        type: "POST",
        url: "../modulos/Control_Custodia.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente la custodia");
            setTimeout(function () {
              $("#container").load("../sistema/custodias/custodia.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar la custodia");
          }
        }
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar custodia
function consultarCustodia(id) {
  $.ajax({
    data: { id: id, CRUD: 0 },
    type: "POST",
    url: "../sistema/custodias/frm_custodias.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}

// Mostrar formulario para actualizar custodia
function actualizarCustodia(id) {
  $.ajax({
    data: { id: id, CRUD: 1 },
    type: "POST",
    url: "../sistema/custodias/frm_custodias.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}
