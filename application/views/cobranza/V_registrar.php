<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cobranza
            <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_cobranza" class="btn btn-danger btn-sm">CANCELAR</a>
          </h1>
        </div>
      </div>
    </div>
  </section>


  <section class="content">

    <div class="container-fluid">


      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Datos Generales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Detalle Cobranza</a>
                </li>
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-2">
                          <label for="cargo">Fecha Registro</label>
                          <div class="input-group">
                            <?php
                            date_default_timezone_set("America/Lima");
                            ?>
                            <input type="date" class="form-control" id="fecha_cotizacion" value="<?php echo date("Y-m-d"); ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Tipo Documento</label>
                          <div class="input-group">
                            <select class="form-select select2" id="id_condicion_pago">
                              <option value="0">Seleccionar</option>
                              <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">N- Serie</label>
                          <div class="input-group">
                            <div class="input-group">
                              <input type="text" class="form-control" id="fecha_cotizacion" placeholder=" EJEMPLO:F002-0000194">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Sucursal</label>
                          <div class="input-group">
                            <select class="form-select select2" id="id_condicion_pago">
                              <option value="0">Seleccionar</option>
                              <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <label for="cargo">Fecha Emision</label>
                          <div class="input-group">
                            <input type="date" class="form-control" id="fecha_cotizacion">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Fecha Venc</label>
                          <div class="input-group">
                            <input type="date" class="form-control" id="fecha_cotizacion">
                          </div>
                        </div>



                      </div>








                      <div class="card card-primary collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title">Datos de Cliente</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="">Cliente</label>
                              <div class="input-group">
                                <input type="hidden" class="form-control" id="id_cliente_proveedor">
                                <input type="text" class="form-control" id="ds_nombre_cliente_proveedor" readonly>
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-outline-success btn-flat" data-toggle="modal" data-target="#opcion_target_clientes_proveedores">
                                    Buscar
                                  </button>
                                  <!-- <a href="<?php echo base_url() . "C_clientes_proveedores" ?>"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user-plus"></i></button></a> -->
                                  <!-- Modal -->
                                  <div class="modal fade" id="opcion_target_clientes_proveedores" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Clientes</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <table id="id_datatable_clientes_proveedores" class="table table-bordered table-sm table-hover table-responsive">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th id="dtable_ds_tipo_persona">Tipo Persona</th>
                                                <th id="dtable_ds_nombre_cliente_proveedor">Razon Social</th>
                                                <th id="dtable_ds_tipo_documento">Tipo Documento</th>
                                                <th id="dtable_num_documento">Num Documento</th>
                                                <th id="dtable_direccion_fiscal">Direccion Fiscal</th>
                                                <th id="dtable_email">Correo Electronico</th>
                                                <th id="dtable_contacto_registro">Contacto Registro</th>
                                                <th id="dtable_telefono">Telefono</th>
                                                <th id="dtable_celular">Celular</th>
                                                <th id="dtable_ds_tipo_giro">Tipo Giro</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php if (!empty($index_clientes_proveedores)) : ?>
                                                <?php foreach ($index_clientes_proveedores as $index_clientes_proveedores) : ?>
                                                  <tr>
                                                    <td>
                                                      <?php $split_clientes_proveedores =
                                                        $index_clientes_proveedores->id_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_nombre_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_departamento_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_provincia_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->ds_distrito_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->direccion_fiscal_cliente_proveedor . "*" .
                                                        $index_clientes_proveedores->email_cliente_proveedor;
                                                      ?>
                                                      <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_clientes_proveedores" value="<?php echo $split_clientes_proveedores; ?>" data-toggle="modal" data-target="#opcion_target_clientes_proveedores"><span class="fas fa-check"></span></button>
                                                    </td>
                                                    <td><?php echo $index_clientes_proveedores->ds_tipo_persona; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->ds_nombre_cliente_proveedor; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->ds_tipo_documento; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->num_documento; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->direccion_fiscal_cliente_proveedor; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->email_cliente_proveedor; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->contacto_registro; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->telefono; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->celular; ?></td>
                                                    <td><?php echo $index_clientes_proveedores->ds_tipo_giro; ?></td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              <?php endif; ?>
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Fin Modal -->
                                </span>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="cargo">Observacion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_provincia_cliente_proveedor"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-md-2">
                              <label for="cargo">Moneda</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_condicion_pago">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                    <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="cargo">Sub-total</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="fecha_cotizacion">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="cargo">Igv</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="fecha_cotizacion">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="cargo">Monto Factura</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="fecha_cotizacion">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="cargo">Estado</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_condicion_pago">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                    <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="cargo">Tipo</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_condicion_pago">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                    <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>


                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-8">
                                <div class="card card-primary collapsed-card">
                                  <div class="card-header">
                                    <h3 class="card-title">Programacion de Pago</h3>
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <div class="col-md-4">
                                        <!-- <label for="">&nbsp;</label> -->
                                        <div class="input-group">
                                          <select class="form-select select2" id="id_condicion_pago">
                                            <option value="0">Seleccionar</option>
                                            <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                              <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <!-- <label>&nbsp;</label> -->
                                        <div class="input-group">
                                          <input type="date" class="form-control" id="fecha_cuota" value="" autocomplete="nope">
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <!-- <label>&nbsp;</label> -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="monto_cuota" value="" autocomplete="nope" placeholder="Ingrese Cuota">
                                        </div>
                                      </div>
                                      <div class="col-md-1">
                                        <!-- <label for="">&nbsp;</label> -->
                                        <div class="input-group">
                                          <button type="button" class="btn btn-outline-success" id="id_agregar_condicion_pago"><span class="fas fa-plus"></span></button>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-md-12">
                                        <div class="card card-primary">
                                          <div class="card-header">
                                            <h3 class="card-title">Programacion de Pagos</h3>
                                          </div>
                                          <form class="form-horizontal">
                                            <div class="card-body" style="overflow-x:auto;">
                                              <table id="id_table_detalle_condicion_pago">
                                                <thead>
                                                  <tr>
                                                    <th>Fecha </th>
                                                    <th>Monto</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                  <tr>
                                                    <th></th>
                                                    <th>Monto Total :
                                                      <label style="font-weight: normal;" class="control-label" id="precio_final_final"></label>
                                                    </th>
                                                  </tr>
                                                </tfoot>
                                              </table>

                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                  <h3 class="card-title">Datos cobranza</h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-plus"></i>
                                    </button>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="form-group row">
                                    <div class="col-md-12">
                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label for="cargo">Fecha deposito</label>
                                          <div class="input-group">
                                            <input type="date" class="form-control" id="fecha_cotizacion">
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <label for="cargo">N.Deposito</label>
                                          <div class="input-group">
                                            <input type="text" class="form-control" id="fecha_cotizacion">
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <label for="cargo">N.letra/cheque</label>
                                          <div class="input-group">
                                            <div class="input-group">
                                              <input type="text" class="form-control" id="fecha_cotizacion">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <label for="cargo">Medio pago</label>
                                          <div class="input-group">
                                            <select class="form-select select2" id="id_condicion_pago">
                                              <option value="0">Seleccionar</option>
                                              <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                                <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <label for="cargo">Banco</label>
                                          <div class="input-group">
                                            <select class="form-select select2" id="id_condicion_pago">
                                              <option value="0">Seleccionar</option>
                                              <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                                <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <label for="cargo">Monto</label>
                                          <div class="input-group">
                                            <div class="input-group">
                                              <input type="text" class="form-control" id="fecha_cotizacion">
                                            </div>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label for="cargo">Moneda</label>
                                          <div class="input-group">
                                            <select class="form-select select2" id="id_condicion_pago">
                                              <option value="0">Seleccionar</option>
                                              <?php foreach ($cbox_condicion_pago_cotizacion  as $cbox_condicion_pago_cotizacion) : ?>
                                                <option value="<?php echo $cbox_condicion_pago_cotizacion->id_dmultitabla; ?>"><?php echo $cbox_condicion_pago_cotizacion->descripcion; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <label for="cargo">Tipo cambio</label>
                                          <div class="input-group">
                                            <div class="input-group">
                                              <input type="text" class="form-control" id="fecha_cotizacion">
                                            </div>
                                          </div>
                                        </div>

                                      </div>
                                      <div class="col-md-1">
                                        <!-- <label for="">&nbsp;</label> -->
                                        <div class="input-group">
                                          <button type="button" class="btn btn-outline-success" id="id_agregar_condicion_pago"><span class="fas fa-plus"></span></button>
                                        </div>
                                      </div>
                                    </div>


                                  </div>
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Detalle Cobranza</h3>
                          </div>
                          <form class="form-horizontal">
                            <div class="card-body" style="overflow-x:auto;">
                              <table id="id_table_detalle_cotizacion" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Item </th>
                                    <th>Fecha deposito</th>
                                    <th>N.deposito</th>
                                    <th>N.letra/ cheque</th>
                                    <th>Medio pago</th>
                                    <th>Banco</th>
                                    <th>Monto</th>
                                    <th>Moneda</th>
                                    <th>Tipo cambio</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </tbody>
                              </table>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label for="">Total </label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="valor_venta_total_sin_d" value="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label for="">Pagado </label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="valor_venta_total_sin_d" value="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label for="">Pendiente</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="valor_venta_total_sin_d" value="">
                            </div>
                          </div>


                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
  </section>
</div>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.1.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>plantilla/plugins/bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>plantilla/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>plantilla/dist/js/demo.js"></script>
<!-- Page specific script -->

<script src="<?php echo base_url() ?>plantilla/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>plantilla/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>plantilla/plugins/alertify/alertify.js"></script>

<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>plantilla/plugins/DataTables/datatables.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>plantilla/plugins/select2/js/select2.full.min.js"></script>

<script>
  var base_url = "<?php echo base_url(); ?>";
</script>

<script src="<?php echo base_url() ?>application/js/j_cotizacion.js"></script>

</body>

</html>