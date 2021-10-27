var t_persona;
function listar_persona() {
  t_persona = $("#tabla_persona").DataTable({
    ordering: true,
    pageLength: 10,
    destroy: true,
    async: false,
    responsive: true,
    autoWidth: false,
    ajax: {
      method: "POST",
      url: "../controlador/persona/controlador_persona_listar.php",
    },
    columns: [
      { defaultContent: "" },
      { data: "persona" },
      { data: "persona_nrodocumento" },
      { data: "persona_tipodocumento" },
      {
        data: "persona_sexo",
        render: function (data, type, row) {
          if (data == "MASCULINO") {
            return "<i class='fa fa-male' aria-hidden='true'></i>";
          } else {
            return "<i class='fa fa-female' aria-hidden='true'></i>";
          }
        },
      },
      { data: "persona_telefono" },
      {
        data: "persona_estatus",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return (
              "<span class='badge badge-success badge-pill m-r-5 m-b-5'>" +
              data +
              "</span>"
            );
          } else {
            return (
              "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>" +
              data +
              "</span>"
            );
          }
        },
      },
      {
        defaultContent:
          "<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>",
      },
    ],
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[3]).css("text-align", "center");
      $($(nRow).find("td")[4]).css("text-align", "center");
    },
    language: idioma_espanol,
    select: true,
  });
  t_persona.on("draw.dt", function () {
    var PageInfo = $("#tabla_persona").DataTable().page.info();
    t_persona
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$('#tabla_persona').on('click','.editar',function(){
  var data = t_persona.row($(this).parents('tr')).data();
  if(t_persona.row(this).child.isShown()){
      var data = t_persona.row(this).data();
  } 
  $("#modal_editar").modal({backdrop: 'static' , Keyboard:false});
  $("#modal_editar").find(".modal-header").css("background", "#374f65");
  $("#modal_editar").find(".modal-header").css("color", "white");
  $("#modal_editar").modal("show");
  $("#txtidpersona").val(data.persona_id);
  $("#txtnombre_editar").val(data.persona_nombre);
  $("#txtapepat_editar").val(data.persona_apepat);
  $("#txtapemat_editar").val(data.persona_apemat);
  $("#txtnro_editar_actual").val(data.persona_nrodocumento);
  $("#txtnro_editar_nuevo").val(data.persona_nrodocumento);
  $("#txttelefono_editar").val(data.persona_telefono);
  $("#cbm_tdocumento_editar").val(data.persona_tipodocumento).trigger("change");
  $("#cbm_sexo_editar").val(data.persona_sexo).trigger("change");
  $("#cbm_estatus").val(data.persona_estatus).trigger("change");
  document.getElementById("div_error_editar").style.display = "none";
})

function Registrar_Persona() {
  var nombre = $("#txtnombre").val();
  var apepat = $("#txtapepat").val();
  var apemat = $("#txtapemat").val();
  var nrodocumento = $("#txtnro").val();
  var tipdocumento = $("#cbm_tdocumento").val();
  var sexo = $("#cbm_sexo").val();
  var telefono = $("#txttelefono").val();

  if (
    nombre.length == 0 ||
    apepat.length == 0 ||
    apemat.length == 0 ||
    nrodocumento.length == 0 ||
    tipdocumento.length == 0 ||
    sexo.length == 0 ||
    telefono.length == 0
  ) {
    MensajeError(
      nombre,
      apepat,
      apemat,
      nrodocumento,
      tipdocumento,
      sexo,
      telefono,
      'div_error'
    );
    return Swal.fire(
      "Mensaje de advertencia",
      "Llene el campo vacio",
      "warning"
    );
  }

  $.ajax({
    url: "../controlador/persona/controlador_registro_persona.php",
    type: "POST",
    data: {
      n: nombre,
      apt: apepat,
      apm: apemat,
      nro: nrodocumento,
      tip: tipdocumento,
      sex: sexo,
      tel: telefono,
    },
  }).done(function (resp) {
    if (isNaN(resp)) {
      document.getElementById("div_error").style.display = "block";
      document.getElementById("div_error").innerHTML =
        "<strong>Revise los siguientes campos:</strong><br>" + resp;
    } else {
      if (resp > 0) {
        document.getElementById("div_error").style.display = "none";
        document.getElementById("div_error").innerHTML =
        "";
        if (resp == 1) {
          LimpiarModal();
          t_persona.ajax.reload();
          $("#modal_registro").modal("hide");
          return Swal.fire(
            "Mensaje de confirmacion",
            "Datos guardados",
            "success"
          );
        } else {
          return Swal.fire(
            "Mensaje de advertencia",
            "El usuario ingresado ya se encuentra en la base de datos",
            "warning"
          );
        }
      } else {
        Swal.fire(
          "Mensaje De Error",
          "Lo sentimos, no se pudo completar el registro",
          "error"
        );
      }
    }
  });
}

function Editar_Persona(){
  var id = $("#txtidpersona").val();
  var nombre = $("#txtnombre_editar").val();
  var apepat = $("#txtapepat_editar").val();
  var apemat = $("#txtapemat_editar").val();
  var nrodocumentoactual = $("#txtnro_editar_actual").val();
  var nrodocumentonuevo = $("#txtnro_editar_nuevo").val();
  var tipdocumento = $("#cbm_tdocumento_editar").val();
  var sexo = $("#cbm_sexo_editar").val();
  var telefono = $("#txttelefono_editar").val();
  var estatus = $("#cbm_estatus").val();

  if (id.length == 0 ||
    nombre.length == 0 ||
    apepat.length == 0 ||
    apemat.length == 0 ||
    nrodocumentoactual.length == 0 ||
    nrodocumentonuevo.length == 0 ||
    tipdocumento.length == 0 ||
    sexo.length == 0 ||
    telefono.length == 0 ||
    estatus == 0
  ) {
    MensajeError(
      nombre,
      apepat,
      apemat,
      nrodocumentonuevo,
      tipdocumento,
      sexo,
      telefono,
      'div_error_editar'
    );
    return Swal.fire(
      "Mensaje de advertencia",
      "Llene el campo vacio",
      "warning"
    );
  }

  $.ajax({
    url: "../controlador/persona/controlador_editar_persona.php",
    type: "POST",
    data: {
      id:id,
      n: nombre,
      apt: apepat,
      apm: apemat,
      nroactual: nrodocumentoactual,
      nronuevo:nrodocumentonuevo,
      tip: tipdocumento,
      sex: sexo,
      tel: telefono,
      estatus:estatus
    },
  }).done(function (resp) {
    if (isNaN(resp)) {
      document.getElementById("div_error_editar").style.display = "block";
      document.getElementById("div_error_editar").innerHTML =
        "<strong>Revise los siguientes campos:</strong><br>" + resp;
    } else {
      if (resp > 0) {
        document.getElementById("div_error_editar").style.display = "none";
        document.getElementById("div_error_editar").innerHTML =
        "";
        if (resp == 1) {
          t_persona.ajax.reload();
          $("#modal_editar").modal("hide");
          return Swal.fire(
            "Mensaje de confirmacion",
            "Datos Actualizados",
            "success"
          );
        } else {
          return Swal.fire(
            "Mensaje de advertencia",
            "El usuario ingresado ya se encuentra en la base de datos",
            "warning"
          );
        }
      } else {
        Swal.fire(
          "Mensaje De Error",
          "Lo sentimos, no se pudo completar la actualizacion",
          "error"
        );
      }
    }
  });
}

function AbrirModal() {
  $("#modal_registro").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro").find(".modal-header").css("background", "#374f65");
  $("#modal_registro").find(".modal-header").css("color", "white");
  $("#modal_registro").modal("show");
  document.getElementById("div_error").style.display = "none";
  LimpiarModal();
}

function MensajeError(
  nombre,
  apepat,
  apemat,
  nrodocumento,
  tipdocumento,
  sexo,
  telefono,
  id
) {
  var cadena = "";
  if (nombre.length == 0) {
    cadena += "El campo nombre no debe estar vacio.<br>";
  }
  if (apepat.length == 0) {
    cadena += "El campo apellido paterno no debe estar vacio.<br>";
  }
  if (apemat.length == 0) {
    cadena += "El campo apellido materno no debe estar vacio.<br>";
  }
  if (nrodocumento.length == 0) {
    cadena += "El campo n&uacute;mero de documento no debe estar vacio.<br>";
  }
  if (tipdocumento.length == 0) {
    cadena += "El campo tipo documento no debe estar vacio.<br>";
  }
  if (sexo.length == 0) {
    cadena += "El campo sexo no debe estar vacio.<br>";
  }
  if (telefono.length == 0) {
    cadena += "El campo telefono no debe estar vacio.<br>";
  }

  document.getElementById(id).style.display = "block";
  document.getElementById(id).innerHTML =
    "<strong>Revise los siguientes campos:</strong><br>" + cadena;
}


function LimpiarModal(){
  
  $("#txtnombre").val("");
  $("#txtapepat").val("");
  $("#txtapemat").val("");
  $("#txtnro").val("");
  $("#txttelefono").val("");
}
