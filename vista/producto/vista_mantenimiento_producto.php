<div class="row">
  <div class="col-md-12">
    <div class="ibox ibox-default">
      <div class="ibox-head">
        <div class="ibox-title">MANTENIMIENTO PRODUCTOS</div>
        <div class="ibox-tools">
          <button class="btn btn-danger" onclick="AbrirModal()">Nuevo Registro</button>
        </div>
      </div>
      <div class="ibox-body">
        <table id="tabla_producto" class="display" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Producto</th>
              <th>Fecha Registro</th>
              <th>Estatus</th>
              <th>Acci&oacute;n</th>
            </tr>
          </thead>
          <tbody>
          </tbody>

          <tfoot>
            <tr>
              <th>#</th>
              <th>Producto</th>
              <th>Fecha Registro</th>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro de producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Producto</label>
        <input type="text" class="form-control" id="txt_producto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Producto()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal editar-->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <input type="text" id="txtidproducto" hidden>
          <label for="">Producto</label>
          <input type="text" id="txt_producto_actual_editar" hidden>
          <input type="text" class="form-control" id="txt_producto_nuevo_editar">
        </div>
        <div class="col-lg-12">
          <label for="">Estatus</label>
          <select class="js-example-basic-single" style="width: 100%;" id="cbm_estatus">
            <option value="ACTIVO">ACTIVO</option>
            <option value="INACTIVO">INACTIVO</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="Editar_Producto()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../../js/console_producto.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    // $('#tabla_rol').DataTable();
    $('.js-example-basic-single').select2();
    lista_producto();

  });
  $('#modal_registro').on('shown.bs.modal', function() {
    $('#txt_producto').trigger('focus')
  })
</script>