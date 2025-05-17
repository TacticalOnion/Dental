$(document).ready(function () {
  $("#btn-registrar-custodio").click(function () {
    $("#container").load("../sistema/custodios/frm_custodios.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario de custodio
function validarFormularioCustodio() {
  if ($("#nombre").val() == "") {
    alertify.error("Debe ingresar el nombre del custodio");
    $("#nombre").focus();
    return false;
  }

  if ($("#apellido_paterno").val() == "") {
    alertify.error("Debe ingresar el apellido paterno");
    $("#apellido_paterno").focus();
    return false;
  }

  if ($("#curp").val() == "") {
    alertify.error("Debe ingresar la CURP");
    $("#curp").focus();
    return false;
  }

  if ($("#rfc").val() == "") {
    alertify.error("Debe ingresar el RFC");
    $("#rfc").focus();
    return false;
  }

  if ($("#telefono").val() == "") {
    alertify.error("Debe ingresar el teléfono");
    $("#telefono").focus();
    return false;
  }

  if ($("#calle").val() == "") {
    alertify.error("Debe ingresar la calle");
    $("#calle").focus();
    return false;
  }

  if ($("#numero_exterior").val() == "") {
    alertify.error("Debe ingresar el número exterior");
    $("#numero_exterior").focus();
    return false;
  }

  if ($("#codigo_postal").val() == "") {
    alertify.error("Debe ingresar el código postal");
    $("#codigo_postal").focus();
    return false;
  }

  if ($("#colonia").val() == "") {
    alertify.error("Debe ingresar la colonia");
    $("#colonia").focus();
    return false;
  }

  if ($("#estado").val() == "") {
    alertify.error("Debe ingresar el estado");
    $("#estado").focus();
    return false;
  }

  return true;
}

// Registrar custodio
$("#btn-agregar-custodio").click(function () {
  if (validarFormularioCustodio()) {
    var parametros = new FormData($("#form_custodio")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Custodio.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        if (response == 1) {
          alertify.success("El custodio se registró correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/custodios/custodios.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al registrar el custodio");
        }
      }
    });
  }
});

// Actualizar custodio
$(document).ready(function () {
  $("#btn-actualizar-custodio").click(function () {
    var parametros = new FormData($("#form_custodio")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Custodio.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta == 1) {
          alertify.success("El custodio se actualizó correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/custodios/custodios.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al actualizar el custodio");
        }
      }
    });
    return false;
  });
});

// Eliminar custodio
function eliminarCustodio(id, descripcion) {
  alertify.confirm(
    "Eliminar Custodio",
    `¿Está seguro de eliminar al custodio <b>${descripcion}</b>?`,
    function () {
      $.ajax({
        data: { id: id, dml: "delete" },
        type: "POST",
        url: "../modulos/Control_Custodio.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente el custodio");
            setTimeout(function () {
              $("#container").load("../sistema/custodios/custodios.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar el custodio");
          }
        }
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar custodio
function consultarCustodio(id) {
  $.ajax({
    data: { id: id, CRUD: 0 },
    type: "POST",
    url: "../sistema/custodios/frm_custodios.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}

// Mostrar formulario para actualizar custodio
function actualizarCustodio(id) {
  $.ajax({
    data: { id: id, CRUD: 1 },
    type: "POST",
    url: "../sistema/custodios/frm_custodios.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}
