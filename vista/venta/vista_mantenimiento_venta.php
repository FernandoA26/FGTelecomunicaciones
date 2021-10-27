<div class="row">
    <div class="col-md-12">
        <div class="ibox ibox-default">
            <div class="ibox-head">
                <div class="ibox-title">VENTAS</div>
                <div class="ibox-tools">
                    <button class="btn btn-danger" onclick="AbrirModal()">Nuevo Registro</button>
                </div>
            </div>
            <div class="ibox-body">
                <table id="tabla_venta" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>DNI</th>
                            <th style="text-align: center;">Plan</th>
                            <th style="text-align: center;">Producto</th>
                            <th>Plano</th>
                            <th>Vendedor</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>DNI</th>
                            <th style="text-align: center;">Plan</th>
                            <th style="text-align: center;">Producto</th>
                            <th>Plano</th>
                            <th>Vendedor</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-lg-12" style="padding-top:8px;">
           <div class="card">
                <div class="card-header">
                    SELECT ANIDADO
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="">Departamento:</label>
                            <select class="js-example-basic-single" name="state" id="sel_departamento" style="width:100%">
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Provincia:</label>
                            <select class="js-example-basic-single" name="state" id="sel_provincia"  style="width:100%">
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Distrito:</label>
                            <select class="js-example-basic-single" name="state" id="sel_distrito"  style="width:100%">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


<!-- Modal de registro -->
<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <h5 class="modal-title" id="myModalLabel">Registro de venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form autocomplete="false" onsubmit="return false">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center;">
                            <b>Datos del Cliente</b>

                        </div>
                        <br>
                        <div class="form-group col-lg-2">
                            <label for="inputName">Tipo Doc.</label>
                            <select class="js-example-basic-single" style="width: 100%;" id="cbm_tdocumento">
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="inputName">Nro Documento</label>
                            <!-- <input type="text" class="form-control" id="inputName" /> -->
                            <div class="input-group">
                                <!-- <div class="input-group-addon"><i class="fa fa-user"></i></div> -->
                                <input class="form-control" type="text" placeholder="input group">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputName">Nombre</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputName">Fijo a portar</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputName">Primer Nombre Papa</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>


                        <div class="form-group col-lg-3">
                            <label for="inputName">Primer Nombre Mama</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="col-lg-12" style="text-align: center;">
                            Direccion de nacimiento

                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputName">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-9">
                            <!-- <label for="inputName">Lugar Nacimiento</label> -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">Departamento:</label>
                                    <select class="js-example-basic-single" name="state" id="sel_departamento" style="width:100%">
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Provincia:</label>
                                    <select class="js-example-basic-single" name="state" id="sel_provincia" style="width:100%">
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Distrito:</label>
                                    <select class="js-example-basic-single" name="state" id="sel_distrito" style="width:100%">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" style="text-align: center;">
                            Direccion de actual

                        </div>

                        <div class="form-group col-lg-12">
                            <!-- <label for="inputName">Lugar Nacimiento</label> -->
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="">Via</label>
                                    <input type="text" class="form-control" id="inputName" />
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Nombre Via</label>
                                    <input type="text" class="form-control" id="inputName" />
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Indentificacion</label>
                                    <input type="text" class="form-control" id="inputName" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Interior</label>
                                    <input type="text" class="form-control" id="inputName" />
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Zona</label>
                                    <input type="text" class="form-control" id="inputName" />
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Nombre Zona</label>
                                    <input type="text" class="form-control" id="inputName" />
                                </div>
                                <div class="form-group col-lg-9">
                                    <!-- <label for="inputName">Lugar Nacimiento</label> -->
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="">Departamento:</label>
                                            <select class="js-example-basic-single" name="state" id="sel_departamento2" style="width:100%">
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Provincia:</label>
                                            <select class="js-example-basic-single" name="state" id="sel_provincia2" style="width:100%">
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Distrito:</label>
                                            <select class="js-example-basic-single" name="state" id="sel_distrito2" style="width:100%">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-7">
                            <label for="inputName">Referencia</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Movil Titular</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Movil Contacto</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Movil Coordinacion</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>



                        <!-- <div class="form-group col-lg-12">
                        <label for="inputMessage">Message</label>
                        <textarea class="form-control" id="inputMessage" ></textarea>
                    </div> -->
                        <div class="col-lg-12" style="text-align: center;">
                            <b>Datos de venta</b>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="inputName">Plano</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="col-lg-4">
                            <label for="">Producto</label>
                            <select class="js-example-basic-single" name="state" id="producto" style="width:100%">
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Plan</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Cargo Fijo</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Asesor Comercial</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Full Claro</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="inputName">¿Cuenta o conto con servicio CLARO HOGAR en la misma direccion</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Tiene Banca Movil</label>
                            <input type="text" class="form-control" id="inputName" />
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputName">Dia y Hora de pago</label>
                            <input type="date" class="form-control" id="inputName" />
                        </div>

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

<script type="text/javascript" src="../../js/console_ubigeo.js?rev=<?php echo time(); ?>"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        listar_venta();
        listar_departamento();
        listar_departamento2();
        listar_producto();
    });

    $("#sel_departamento").change(function() {
        var iddepartamento = $("#sel_departamento").val();
        listar_pronvincia(iddepartamento);
    })
    $("#sel_departamento2").change(function() {
        var iddepartamento2 = $("#sel_departamento2").val();
        listar_pronvincia2(iddepartamento2);
    })

    $("#sel_provincia").change(function() {
        var idprovincia = $("#sel_provincia").val();
        listar_distrito(idprovincia);
    })
    $("#sel_provincia2").change(function() {
        var idprovincia2 = $("#sel_provincia2").val();
        listar_distrito2(idprovincia2);
    })
</script>