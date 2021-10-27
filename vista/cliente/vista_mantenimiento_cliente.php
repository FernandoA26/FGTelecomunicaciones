<div class="row">
  <div class="col-md-12">
    <div class="ibox ibox-default">
      <div class="ibox-head">
        <div class="ibox-title">MANTENIMIENTO CLIENTES</div>
        <div class="ibox-tools">
          <button class="btn btn-danger" onclick="AbrirModal()">Nuevo Registro</button>
        </div>
      </div>
      <div class="ibox-body">
        <table id="tabla_cliente" class="display" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Cliente</th>
              <th>Nro documento</th>
              <th style="text-align: center;">Tipo documento</th>
              <th style="text-align: center;">Lugar Nacimiento</th>
              <th>Fecha Nacimiento</th>
              <th>Fijo a portar</th>
              <th>Nro Contacto</th>
              <th>Acci&oacute;n</th>
            </tr>
          </thead>
          <tbody>
          </tbody>

          <tfoot>
            <tr>
                <th>#</th>
              <th>Cliente</th>
              <th>Nro documento</th>
              <th style="text-align: center;">Tipo documento</th>
              <th style="text-align: center;">Lugar Nacimiento</th>
              <th>Fecha Nacimiento</th>
              <th>Fijo a portar</th>
              <th>Nro Contacto</th>
              <th>Acci&oacute;n</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal registro -->
<!-- <div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro de persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="txtnombre" onkeypress="return sololetras(event)">
            
          </div>
          <div class="col-lg-6">
            <label for="">Apellido Paterno</label>
            <input type="text" class="form-control" id="txtapepat" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Apellido Materno</label>
            <input type="text" class="form-control" id="txtapemat" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Nro Documento</label>
            <input type="text" class="form-control" id="txtnro" onkeypress="return soloNumeros(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Tipo Documento</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_tdocumento">
              <option value="DNI">DNI</option>
              <option value="RUC">RUC</option>
              <option value="PASAPORTE">PASAPORTE</option>
            </select>
          </div>
          <div class="col-lg-6">
            <label for="">Sexo</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_sexo">
              <option value="MASCULINO">MASCULINO</option>
              <option value="FEMENINO">FEMENINO</option>
            </select>
          </div>
          <div class="col-lg-6">
            <label for="">Nro Telefono</label>
            <input type="text" class="form-control" id="txttelefono" onkeypress="return soloNumeros(event)">
          </div>
           <div class="col-lg-12">
            <div class="alert alert-danger alert-bordered" id="div_error" style="display: none;"></div>
          </div> 

          <div class="col-lg-12"><br>
            <div class="alert alert-danger alert-bordered" id="div_error" style="display: none;"></div>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Persona()">Guardar</button>
      </div>
    </div>
  </div>
</div> -->

<!-- Modal editar-->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-lg-12">
          <input type="text" id="txtidpersona" hidden>
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="txtnombre_editar" onkeypress="return sololetras(event)">
            
          </div>
          <div class="col-lg-6">
            <label for="">Apellido Paterno</label>
            <input type="text" class="form-control" id="txtapepat_editar" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Apellido Materno</label>
            <input type="text" class="form-control" id="txtapemat_editar" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Nro Documento</label>
            <input type="text" id="txtnro_editar_actual" onkeypress="return soloNumeros(event)" hidden>
            <input type="text" class="form-control" id="txtnro_editar_nuevo" onkeypress="return soloNumeros(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Tipo Documento</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_tdocumento_editar">
              <option value="DNI">DNI</option>
              <option value="RUC">RUC</option>
              <option value="PASAPORTE">PASAPORTE</option>
            </select>
          </div>
          <div class="col-lg-4">
            <label for="">Sexo</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_sexo_editar">
              <option value="MASCULINO">MASCULINO</option>
              <option value="FEMENINO">FEMENINO</option>
            </select>
          </div>
          <div class="col-lg-4">
            <label for="">Nro Telefono</label>
            <input type="text" class="form-control" id="txttelefono_editar" onkeypress="return soloNumeros(event)">
          </div>
          <div class="col-lg-4">
            <label for="">Estatus</label>
            <select class="js-example-basic-single" style="width: 100%;" id="cbm_estatus">
              <option value="ACTIVO">ACTIVO</option>
              <option value="INACTIVO">INACTIVO</option>
            </select>
          </div>
          

          <div class="col-lg-12"><br>
            <div class="alert alert-danger alert-bordered" id="div_error_editar" style="display: none;"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Editar_Persona()">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de prueba -->
<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               
                <h5 class="modal-title" id="myModalLabel">Registro de persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form autocomplete="false" onsubmit="return false">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Message</label>
                        <textarea class="form-control" id="inputMessage" placeholder="Enter your message"></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../js/console_cliente.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    // $('#tabla_persona').DataTable();
    $('.js-example-basic-single').select2();
    listar_cliente();

  });
//   $('#modal_registro').on('shown.bs.modal', function() {
//     $('#txtnombre').trigger('focus')
//   })
</script>