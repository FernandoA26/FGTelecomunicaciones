<div class="row">
  <div class="col-md-12">
    <div class="ibox ibox-default">
      <div class="ibox-head">
        <div class="ibox-title">MANTENIMIENTO USUARIOS</div>
        <div class="ibox-tools">
          <button class="btn btn-danger" onclick="AbrirModal()">Nuevo Registro</button>
        </div>
      </div>
      <div class="ibox-body">
        <table id="tabla_usuario" class="display" style="width:100%">
          <thead>
            <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Trabajador</th>
            <th>Rol</th>
            <th>Email</th>
            <!-- <th style="text-align: center;">Imagen</th> -->
            <th>Estatus</th>
            <th>Acci&oacute;n</th>
            </tr>
          </thead>
          <tbody>
          </tbody>

          <tfoot>
            <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Trabajador</th>
            <th>Rol</th>
            <th>Email</th>
            <!-- <th style="text-align: center;">Imagen</th> -->
            <th>Estatus</th>
            <th>Acci&oacute;n</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal registro-->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-6">
          
            <label for="">Usuario</label>
            <input type="text" class="form-control" id="txt_usu" >
            
          </div>
          <div class="col-lg-6">
            <label for="">Contrase&ntilde;a</label>
            <input type="password" class="form-control" id="txt_con" >
          </div>
          <div class="col-lg-6">
            <label for="">Trabajador</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_trabajador">
              
            </select>
          </div>
          <div class="col-lg-6">
            <label for="">Email</label>
            <input type="text" class="form-control" id="txt_email">
          </div>

          <div class="col-lg-6">
            <label for="">Rol</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_rol">
              
            </select>
          </div>
          <!-- <div class="col-lg-6">
            <label for="">Subir imagen</label>
            <input type="file" class="form-control-file" id="imagen" accept="image/*">
          </div> -->
          
        
          

          <div class="col-lg-12"><br>
            <div class="alert alert-danger alert-bordered" id="div_error" style="display: none;"></div>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Usuario()" style="background: #374f65;">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar-->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          
          <!--  -->
          <div class="col-lg-6">
          <input type="text" id="txtidusuario" hidden>
            <label for="">Usuario</label>
            <input type="text" class="form-control" id="txt_usu_editar_actual" disabled>
            
          </div>
          <div class="col-lg-6">
            <label for="">Trabajador</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_trabajador_editar">
              
            </select>
          </div>
          <div class="col-lg-6">
            <label for="">Email</label>
            <input type="text" class="form-control" id="txt_email_editar_nuevo">
          </div>

          <div class="col-lg-6">
            <label for="">Rol</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_rol_editar">
              
            </select>
          </div>
          <div class="col-lg-4">
            <label for="">Estatus</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_estatus">
              <option value="ACTIVO">ACTIVO</option>
              <option value="INACTIVO">INACTIVO</option>
            </select>
          </div>
          <!-- <div class="col-lg-6">
            <label for="">Subir imagen</label>
            <input type="file" class="form-control-file" id="imagen_editar" accept="image/*">
          </div> -->
          
        
          

          <div class="col-lg-12"><br>
            <div class="alert alert-danger alert-bordered" id="div_error" style="display: none;"></div>
          </div>
          <!-- <div class="col-lg-12">
            <div class="alert alert-danger alert-bordered" id="div_error" style="display: none;"></div>
          </div> -->

          <div class="col-lg-12"><br>
            <div class="alert alert-danger alert-bordered" id="div_error_editar" style="display: none;"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Editar_Usuario()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../../js/console_usuario.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    // $('#tabla_persona').DataTable();
    $('.js-example-basic-single').select2();
    listar_usuario();
    Listar_persona_combo();
    Listar_rol_combo();

  });
  $('#modal_registro').on('shown.bs.modal', function() {
    $('#txt_usu').trigger('focus')
  })

//   document.getElementById("imagen").addEventListener("change", () => {
//      var fileName = document.getElementById("imagen").value; 
//      var idxDot = fileName.lastIndexOf(".") + 1; 
//      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase(); 
//      if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 
//       //TO DO 
//      }else{ 
//       Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SE ACEPTAN IMAGENES - USTED SUBIO UN ARCHIVO CON EXTENSION"+extFile,"warning"); 
//       document.getElementById("imagen").value="";
//      } 
// });
</script>