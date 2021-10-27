var t_venta;
function listar_venta() {
  t_venta = $("#tabla_venta").DataTable({
    ordering: true,
    pageLength: 10,
    destroy: true,
    async: false,
    responsive: true,
    autoWidth: false,
    ajax: {
      method: "POST",
      url: "../controlador/venta/controlador_venta_listar.php",
    },
    columns: [
      { defaultContent: "" },
      { data: "Cliente" },
      { data: "cliente_nrodocumento" },
      { data: "detalleprev_plan" },
      { data: "producto_nombre" },
      { data: "preventa_plano" },
      { data: "detallepre_asesorcomercial" },
      {
        data: "preventa_status",
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
  t_venta.on("draw.dt", function () {
    var PageInfo = $("#tabla_venta").DataTable().page.info();
    t_venta
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}

function listar_departamento(){
    $.ajax({
        url:'../controlador/venta/controlador_listar_departamento.php',
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_departamento").html(cadena);
            $("#sel_departamento2").html(cadena);
            var iddepartamento = $("#sel_departamento").val();
            listar_pronvincia(iddepartamento);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_departamento").html(cadena);
        }
    })
}
function listar_producto(){
  $.ajax({
      url:'../controlador/venta/controlador_listar_producto.php',
      type:'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for (var i =0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
              
          }
          $("#producto").html(cadena);
      }else{
          cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
          $("#producto").html(cadena);
      }
  })
}
function listar_departamento2(){
  $.ajax({
      url:'../controlador/venta/controlador_listar_departamento.php',
      type:'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for (var i =0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
              
          }
          $("#sel_departamento2").html(cadena);
          var iddepartamento = $("#sel_departamento2").val();
          listar_pronvincia2(iddepartamento);
      }else{
          cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
          $("#sel_departamento2").html(cadena);
      }
  })
}

function listar_pronvincia(iddepartamento){
    $.ajax({
        url:'../controlador/venta/controlador_listar_provincia.php',
        type:'POST',
        data:{
            iddepartamento:iddepartamento
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_provincia").html(cadena);
            var idprovincia = $("#sel_provincia").val();
            listar_distrito(idprovincia);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_provincia").html(cadena);
        }
    })
}
function listar_pronvincia2(iddepartamento){
  $.ajax({
      url:'../controlador/venta/controlador_listar_provincia.php',
      type:'POST',
      data:{
          iddepartamento:iddepartamento
      }
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for (var i =0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
              
          }
          $("#sel_provincia2").html(cadena);
          var idprovincia = $("#sel_provincia2").val();
          listar_distrito2(idprovincia);
      }else{
          cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
          $("#sel_provincia2").html(cadena);
      }
  })
}



function listar_distrito(idprovincia){
    $.ajax({
        url:'../controlador/venta/controlador_listar_distrito.php',
        type:'POST',
        data:{
            idprovincia:idprovincia
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_distrito").html(cadena);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_distrito").html(cadena);
        }
    })
}

function listar_distrito2(idprovincia){
  $.ajax({
      url:'../controlador/venta/controlador_listar_distrito.php',
      type:'POST',
      data:{
          idprovincia:idprovincia
      }
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for (var i =0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
              
          }
          $("#sel_distrito2").html(cadena);
      }else{
          cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
          $("#sel_distrito2").html(cadena);
      }
  })
}

function AbrirModal() {
    $("#modal_registro").modal({ backdrop: "static", keyboard: false });
    $("#modal_registro").find(".modal-header").css("background", "#374f65");
    $("#modal_registro").find(".modal-header").css("color", "white");
    $("#modal_registro").modal("show");
    // document.getElementById("div_error").style.display = "none";
    // LimpiarModal();
  }