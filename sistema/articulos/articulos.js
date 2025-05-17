$(document).ready(function () {
  $("#btn-registro-articulo").click(function () {
    $("#container").load("../sistema/articulos/frm_articulos.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioEvento() {

  if ($("#nombProd").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("nombProd").focus();
    alertify.error("Debe ingresar el nombre del articulo");
    return false;
  }


   if ($("#descripcion").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("descripcion").focus();
    alertify.error("Debe ingresar la descripción");
    return false;
  }



  if ($("#tipoMaterial").val() == 0) {
    alertify.error("Debe seleccionar un tipo de material");
    $("html, body").animate({ scrollTop: 200 }, "slow");
    document.getElementById("tipoMaterial").focus();
    return false;
  }


  if ($("#proveedor").val() == 0) {
    alertify.error("Debe seleccionar un proveedor");
    $("html, body").animate({ scrollTop: 200 }, "slow");
    document.getElementById("proveedor").focus();
    return false;
  }


  if ($("#fecha").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("fecha").focus();
    alertify.error("Debe ingresar la fecha");
    return false;
  }
    
  if ($("#comentarioProveedor").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("comentarioProveedor").focus();
    alertify.error("Debe ingresar la comentario proveedor");
    return false;
  }

  if ($("#disponibilidad").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("disponibilidad").focus();
    alertify.error("Debe ingresar la disponibilidad del articulo");
    return false;
  }
  
  return true;
}


// Registrar articlo
$("#btn-agregar-articulo").click(function () {

if (validarFormularioEvento()) {
    var parametros = new FormData($("#form_articulo")[0]);
    $.ajax({
        data: parametros,
        url: "../modulos/Control_Articulo.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function(response)
        {
          console.log(response);
          if (response == 1) {
            alertify.success("El registro del articulo se actualizó correctamente");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load(
                "../sistema/articulos/articulos.php"
              );
            }, 0);
          } else {
            alertify.error("Hubo un problema al registrar los datos del evento");
          }
        }
    });
    }
});


// Actualizar evento
function actualizarArticulo(id) {
  var datos = {
    id: id,
    CRUD: 1,
  };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/articulos/frm_articulos.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}

$(document).ready(function () {
  $("#btn-actualizar-articulo").click(function () {
    
      var parametros = new FormData($("#form_articulo")[0]);
      $.ajax({
        data: parametros,
        url: "../modulos/Control_Articulo.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("El registro del articulo se actualizó correctamente.");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load(
                "../sistema/articulos/articulos.php"
              );
            }, 0);
          } else {
            alertify.error("Hubo un problema al actualizar los datos del articulo.");
          }
        },
      });
      return false;
  });
})



// Eliminar evento
function eliminarArticulo(id,articulo) {
  var mensaje = "¿Esta seguro de eliminar el articulo ";
  mensaje = mensaje.concat(articulo.bold());
  mensaje = mensaje.concat("?");

  var titulo = "Eliminar Articulo";
  alertify.confirm(
    titulo,
    mensaje,
    function () {
      var dml = "delete";
      var datos = {
        id: id,
        dml: dml,
      };
      $.ajax({
        data: datos,
        type: "POST",
        url: "../modulos/Control_Articulo.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se elimino de manera correcta el articulo");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load(
                "../sistema/articulos/articulos.php"
              );
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar el articulo");
          }
        },
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}


// Consultar evento
function consultarArticulo(id) {
  var datos = {
    id: id,
    CRUD: 0,
   };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/articulos/frm_articulos.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}
