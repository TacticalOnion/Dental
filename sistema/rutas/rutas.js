$(document).ready(function () { 
  $("#btn-registrar-ruta").click(function () {
    $("#container").load("../sistema/rutas/frm_rutas.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioRuta() {
  if ($("#estado_inicial").val() == "") {
    alertify.error("Debe ingresar el estado inicial");
    $("#estado_inicial").focus();
    return false;
  }

  if ($("#estado_final").val() == "") {
    alertify.error("Debe ingresar el estado final");
    $("#estado_final").focus();
    return false;
  }

  if ($("#pagar_caseta").val() == "") {
    alertify.error("Debe seleccionar si se paga caseta");
    $("#pagar_caseta").focus();
    return false;
  }

  if ($("#costo_caseta").val() == "") {
    alertify.error("Debe ingresar el costo de caseta");
    $("#costo_caseta").focus();
    return false;
  }

  if ($("#tiempo_aproximado").val() == "") {
    alertify.error("Debe ingresar el tiempo aproximado");
    $("#tiempo_aproximado").focus();
    return false;
  }

  if ($("#descripcion").val() == "") {
    alertify.error("Debe ingresar la descripción");
    $("#descripcion").focus();
    return false;
  }

  return true;
}

// Registrar ruta
$("#btn-agregar-ruta").click(function () {
  if (validarFormularioRuta()) {
    var parametros = new FormData($("#form_ruta")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Ruta.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        if (response == 1) {
          alertify.success("La ruta se registró correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/rutas/rutas.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al registrar la ruta");
        }
      }
    });
  }
});

// Actualizar ruta
$(document).ready(function () {
  $("#btn-actualizar-ruta").click(function () {
    var parametros = new FormData($("#form_ruta")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Ruta.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta == 1) {
          alertify.success("La ruta se actualizó correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/rutas/rutas.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al actualizar la ruta");
        }
      }
    });
    return false;
  });
});

// Eliminar ruta
function eliminarRuta(id, descripcion) {
  alertify.confirm(
    "Eliminar Ruta",
    `¿Está seguro de eliminar la ruta <b>${descripcion}</b>?`,
    function () {
      $.ajax({
        data: { id: id, dml: "delete" },
        type: "POST",
        url: "../modulos/Control_Ruta.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente la ruta");
            setTimeout(function () {
              $("#container").load("../sistema/rutas/rutas.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar la ruta");
          }
        }
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar ruta
function consultarRuta(id) {
  $.ajax({
    data: { id: id, CRUD: 0 },
    type: "POST",
    url: "../sistema/rutas/frm_rutas.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}

// Mostrar formulario para actualizar ruta
function actualizarRuta(id) {
  $.ajax({
    data: { id: id, CRUD: 1 },
    type: "POST",
    url: "../sistema/rutas/frm_rutas.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}
