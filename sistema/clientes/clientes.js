$(document).ready(function () {
  $("#btn-registrar-cliente").click(function () {
    $("#container").load("../sistema/clientes/frm_clientes.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioCliente() {
  if ($("#nombre").val() == "") {
    alertify.error("Debe ingresar el nombre del cliente");
    $("#nombre").focus();
    return false;
  }

  if ($("#empresa").val() == "") {
    alertify.error("Debe ingresar la empresa del cliente");
    $("#empresa").focus();
    return false;
  }

  if ($("#telefono").val() == "") {
    alertify.error("Debe ingresar el teléfono del cliente");
    $("#telefono").focus();
    return false;
  }

  if ($("#correo").val() == "") {
    alertify.error("Debe ingresar el correo del cliente");
    $("#correo").focus();
    return false;
  }

  if ($("#comentarios").val() == "") {
    alertify.error("Debe ingresar comentarios del cliente");
    $("#comentarios").focus();
    return false;
  }

  return true;
}

// Registrar cliente
$("#btn-agregar-cliente").click(function () {
  if (validarFormularioCliente()) {
    var parametros = new FormData($("#form_cliente")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Cliente.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        if (response == 1) {
          alertify.success("El cliente se registró correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/clientes/clientes.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al registrar el cliente");
        }
      }
    });
  }
});

// Actualizar cliente
$(document).ready(function () {
  $("#btn-actualizar-cliente").click(function () {
    var parametros = new FormData($("#form_cliente")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Cliente.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta == 1) {
          alertify.success("El cliente se actualizó correctamente");
          setTimeout(function () {
            $("#container").load("../sistema/clientes/clientes.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al actualizar el cliente");
        }
      }
    });
    return false;
  });
});

// Eliminar cliente
function eliminarCliente(id, nombre) {
  alertify.confirm(
    "Eliminar Cliente",
    `¿Está seguro de eliminar al cliente <b>${nombre}</b>?`,
    function () {
      $.ajax({
        data: { id: id, dml: "delete" },
        type: "POST",
        url: "../modulos/Control_Cliente.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente el cliente");
            setTimeout(function () {
              $("#container").load("../sistema/clientes/clientes.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar el cliente");
          }
        }
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar cliente
function consultarCliente(id) {
  $.ajax({
    data: { id: id, CRUD: 0 },
    type: "POST",
    url: "../sistema/clientes/frm_clientes.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}

// Mostrar formulario para actualizar cliente
function actualizarCliente(id) {
  $.ajax({
    data: { id: id, CRUD: 1 },
    type: "POST",
    url: "../sistema/clientes/frm_clientes.php",
    success: function (data) {
      $("#container").html(data);
      $("html, body").animate({ scrollTop: 0 }, 0);
    }
  });
}
