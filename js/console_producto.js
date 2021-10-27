var t_producto;
function lista_producto(){

    t_producto = $("#tabla_producto").DataTable({
		"ordering":true,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
    	"autoWidth": false,
      "ajax":{
        "method":"POST",
		"url":"../controlador/producto/controlador_producto_listar.php",
      },
      "columns":[
            {"defaultContent":""},
            {"data":"producto_nombre"},
            {"data":"producto_feregistro"},
            {"data":"producto_status",
            render: function (data, type, row ) {
                if(data=='ACTIVO'){
                    return "<span class='badge badge-success badge-pill m-r-5 m-b-5'>"+data+"</span>";                   
                }else{
                  return "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>"+data+"</span>";                  
                }
              }},
            {"defaultContent":"<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>"}
		  
      ],
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        	$($(nRow).find("td")[4]).css('text-align', 'left' );
        },
        "language":idioma_espanol,
        select: true
	});
	t_producto.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_producto').DataTable().page.info();
        t_producto.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
  
}

$('#tabla_producto').on('click','.editar',function(){
  var data = t_producto.row($(this).parents('tr')).data();
  if(t_producto.row(this).child.isShown()){
      var data = t_producto.row(this).data();
  }
  $("#modal_editar").modal({backdrop:'static',keyboard:false})
  $("#modal_editar").modal('show');
  $("#txtidrol").val(data.rol_id);
  $("#txt_producto_actual_editar").val(data.rol_nombre);
  $("#txt_producto_nuevo_editar").val(data.rol_nombre);
  $("#cbm_estatus").val(data.rol_estatus).trigger("change");
  
})

function AbrirModal(){
  $("#modal_registro").modal({backdrop:'static',keyboard:false});
  $("#modal_registro").modal('show');
}

function Registrar_Producto(){
  var producto = $("#txt_producto").val();


  if (producto.length==0){
    return Swal.fire("Mensaje de advertencia","Llene el campo vacio","warning")
  }

  $.ajax({
    url: '../controlador/producto/controlador_producto_registro.php',
    type: 'POST',
    data:{
        producto:producto
    }
  }).done(function(resp){  
    console.log(resp);
    if (resp>0) {
      if (resp==1){
        t_producto.ajax.reload();
        $("#modal_registro").modal('hide');
        return Swal.fire("Mensaje de confirmacion","Datos guardados","success");
      }else{
      return Swal.fire("Mensaje de advertencia","El producto ingresado ya se encuentra en la base de datos","warning");
      }
    }else{
      return Swal.fire("Mensaje de error","El registro no se pudo completar","error");
    }
  
  })
}

$('#tabla_producto').on('click','.editar',function(){
  var data = t_rol.row($(this).parents('tr')).data();
  if(t_rol.row(this).child.isShown()){
      var data = t_rol.row(this).data();
  }
  $("#modal_editar").modal({backdrop:'static',keyboard:false})
  $("#modal_editar").modal('show');
  $("#txtidproducto").val(data.rol_id);
  $("#txt_producto_actual_editar").val(data.rol_nombre);
  $("#txt_producto_nuevo_editar").val(data.rol_nombre);
  $("#cbm_estatus").val(data.rol_estatus).trigger("change");
  
})

function Editar_Rol(){
  var id = $("#txtidproducto").val();
  var productoactual = $("#txt_producto_actual_editar").val();
  var productonuevo = $("#txt_producto_nuevo_editar").val();
  var estatus = $("#cbm_estatus").val();

  if (id.length==0 || productoactual.length==0 || productonuevo.length==0 || estatus.length==0) {
    Swal.fire("Mensaje de advertencia","Llene los campos vacios","warning")
  }

  $.ajax({
    url: '../controlador/producto/controlador_editar_producto.php',
    type: 'POST',
    data:{
      id:id,
      rolactual:rolactual,
      rolnuevo:rolnuevo,
      estatus:estatus
    }
  }).done(function(resp){  
    console.log(resp);
    if (resp>0) {
      if (resp==1) {
        t_rol.ajax.reload();
        $("#modal_editar").modal('hide');
        Swal.fire("Mensaje de confirmacion","Datos actualizados","success");
    }else{
      Swal.fire("Mensaje de advertencia","El rol ingresado ya se encuentra en la base de datos","warning");
    }
    }else{
      Swal.fire("Mensaje de error","La actulizacion no se pudo completar","error");
    }
  
  })
}

