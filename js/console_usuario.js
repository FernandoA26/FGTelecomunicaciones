function Verificar_Usuario() {
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    if (usuario.length==0 || password.length==0) {
        return Swal.fire("Mensaje de advertencia","Llene los campos vacios","warning");
    }
    
    $.ajax({
        url:'../controlador/usuario/controlador_verificar_usuario.php',
        type:'POST',
        data:{
            u:usuario,
            p:password
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        if (resp==0) {
            Swal.fire("Mensaje de advertencia",'Usuario y/o contrase\u00f1a incorrecta',"warning");
        }else{
            if (data[0][5]==="ACTIVO") {
                $.ajax({
                    url:'../controlador/usuario/controlador_crear_session.php',
                    type:'POST',
                    data:{
                        idusuario:data[0][0],
                        usuario:data[0][1],
                        rol:data[0][6],
                        persona:data[0][7]
                        
                    }
                }).done(function(resp){
                    let timerInterval
                    Swal.fire({
                      title: 'Bienvenido al sistema',
                      html: 'Usted sera redireccionado en <b></b> milisegundos.',
                      timer: 2000,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft()
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      /* Read more about handling dismissals below */
                      if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                      }
                    })
                })
            }else{
                return Swal.fire("Mensaje de advertencia","Lo sentimos el usuario "+usuario+" se encuentra suspendido, comuniquese con el administrador","warning");
            }
        }
    })
}



var t_usuario;
function listar_usuario(){
  t_usuario = $("#tabla_usuario").DataTable({
    ordering: true,
    pageLength: 10,
    destroy: true,
    async: false,
    responsive: true,
    autoWidth: false,
    ajax: {
      method: "POST",
      url: "../controlador/usuario/controlador_usuario_listar.php",
    },
    columns: [
      { defaultContent: "" },
      { data: "usuario_nombre" },
      { data: "persona" },
      { data: "rol_nombre" },
      { data: "usuario_email" },
      // { data: "usuario_imagen",
      // render: function (data, type, row) {
      //   return '<img src="../'+data+'" class="img-circle m-r-10" style="width:28px;">';
      // } },
      {
        data: "usuario_estatus",
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
        }
      },
      {
        defaultContent:
          "<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>",
      },
    ],
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      // $($(nRow).find("td")[3]).css("text-align", "center");
      $($(nRow).find("td")[4]).css("text-align","left");
      // $($(nRow).find("td")[5]).css("text-align","center");
    },
    language: idioma_espanol,
    select: true,
  });
  t_usuario.on("draw.dt", function () {
    var PageInfo = $("#tabla_usuario").DataTable().page.info();
    t_usuario
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

$('#tabla_usuario').on('click','.editar',function(){
  var data = t_usuario.row($(this).parents('tr')).data();
  if(t_usuario.row(this).child.isShown()){
      var data = t_usuario.row(this).data();
  } 
  $("#modal_editar").modal({backdrop: 'static' , Keyboard:false});
  $("#modal_editar").find(".modal-header").css("background", "#374f65");
  $("#modal_editar").find(".modal-header").css("color", "white");
  $("#modal_editar").modal("show");

  $("#txtidusuario").val(data.usuario_id);
  $("#txt_usu_editar_actual").val(data.usuario_nombre);
  $("#cbm_trabajador_editar").val(data.persona_id).trigger("change");
  $("#txt_email_editar_nuevo").val(data.usuario_email);
  $("#cbm_rol_editar").val(data.rol_id).trigger("change");
  $("#cbm_estatus").val(data.usuario_estatus).trigger("change");
  document.getElementById("div_error_editar").style.display = "none";
})

function Editar_Usuario(){
  var id = $("#txtidusuario").val();
  var idtrabajador = $("#cbm_trabajador_editar").val();
  var emailnuevo = $("#txt_email_editar_nuevo").val();
  var rol = $("#cbm_rol_editar").val();
  var estatus = $("#cbm_estatus").val();

  if (id.length == 0 ||
    idtrabajador.length == 0 ||
    emailnuevo.length == 0 ||
    rol.length == 0 ||
    estatus == 0
  ) {
    return Swal.fire("Mensaje de advertencia","Llene los campos vacios","warning");
  }

  $.ajax({
    url: "../controlador/usuario/controlador_editar_usuario.php",
    type: "POST",
    data: {
      id:id,
      idtrabajador: idtrabajador,
      emailnuevo: emailnuevo,
      rol: rol,
      estatus:estatus
    },
  }).done(function (resp) {
    if (resp>0) {
      if (resp==1) {
        t_usuario.ajax.reload();
        $("#modal_editar").modal('hide');
        Swal.fire("Mensaje de confirmacion","Datos actualizados","success");
    }else{
      Swal.fire("Mensaje de advertencia","El usuario ingresado ya se encuentra en la base de datos","warning");
    }
    }else{
      Swal.fire("Mensaje de error","La actulizacion no se pudo completar","error");
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

function Listar_persona_combo(){
  $.ajax({
    url:"../controlador/usuario/controlador_persona_combo_listar.php",
    type:'POST'
  }).done(function(resp){
    var data = JSON.parse(resp);
    var cadena ="";
    if (data.length>0) {
      for (var index = 0; index < data.length; index++) {
        cadena+="<option value='"+data[index][0]+"'>"+data[index][1]+"</option>";
        
      }
      $("#cbm_trabajador").html(cadena);
      $("#cbm_trabajador_editar").html(cadena);
    }else{
      cadena+="<option value=''>No se encontraron datos</option>";
                $("#cbm_trabajador").html(cadena);
                $("#cbm_trabajador_editar").html(cadena);
    }
  })
}

function Listar_rol_combo(){
  $.ajax({
    url:"../controlador/usuario/controlador_rol_combo_listar.php",
    type:'POST'
  }).done(function(resp){
    var data = JSON.parse(resp);
    var cadena ="";
    if (data.length>0) {
      for (var index = 0; index < data.length; index++) {
        cadena+="<option value='"+data[index][0]+"'>"+data[index][1]+"</option>";
        
      }
      $("#cbm_rol").html(cadena);
      $("#cbm_rol_editar").html(cadena);
    }else{
      cadena+="<option value=''>No se encontraron datos</option>";
                $("#cbm_rol").html(cadena);
                $("#cbm_rol_editar").html(cadena);
    }
  })
}

function Registrar_Usuario(){
  var usuario = $("#txt_usu").val();
  var password = $("#txt_con").val();
  var idtrabajador = $("#cbm_trabajador").val();
  var email = $("#txt_email").val();
  var idrol = $("#cbm_rol").val();
  var archivo = $("#imagen").val();
  var f = new Date();

  var extension= archivo.split('.').pop();
  var nombrearchivo = "IMG"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMinutes()+""+f.getSeconds()+"."+extension;

  var formData = new FormData();
  var foto = $("#imagen")[0].files[0];
  if (validad_email(email)) {
    
  }else{
    return Swal.fire("Mensaje de advertencia","El formato de email es incorrecto","warning");
  }
  formData.append('usuario',usuario);
  formData.append('password',password);
  formData.append('idtrabajador',idtrabajador);
  formData.append('email',email);
  formData.append('idrol',idrol);
  formData.append('foto',foto);
  formData.append('nombrearchivo',nombrearchivo);
  $.ajax({
    url:"../controlador/usuario/controlador_usuario_registro.php",
    type:'POST',
    data:formData,
    contentType:false,
    processData:false,
    success: function(resp) {
      if (resp !=0) {
        if (resp==1){
          LimpiarModal()
          t_usuario.ajax.reload();
          $("#modal_registro").modal('hide');
          return Swal.fire("Mensaje de confirmacion","Datos guardados","success");
        }else{
        return Swal.fire("Mensaje de advertencia","El usuario o email ya se encuentra en la BD","warning");
        }
      }
    }
  });
  return false;
}

function validad_email(email){
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email) ? true : false;
}

function LimpiarModal(){
  
  $("#txt_usu").val("");
  $("#txt_con").val("");
  $("#txt_email").val("");
  $("#imagen").val();
}



