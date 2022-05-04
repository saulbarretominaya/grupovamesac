<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Compras / Cobranzas
            <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_compras_cobranzas" class="btn btn-danger btn-sm">CANCELAR</a>
          </h1>
        </div>
      </div>
    </div>
    <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
    <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>">
    <input type="hidden" id="id_compra_cobranza_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
    <input type="hidden" id="id_empresa" value="<?php echo $this->session->userdata("id_empresa") ?>">

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
                      <div class="card card-primary">
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
                            <div class="col-md-3">
                              <label for="cargo">Fec. Comp / Cobr</label>
                              <div class="input-group">
                                <?php
                                date_default_timezone_set("America/Lima");
                                ?>

                                <input type="hidden" id="hidden_item">
                                <input type="date" class="form-control" id="fecha_compra_cobranza" value="<?php echo date("Y-m-d"); ?>" readonly>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Tipo Comprobante</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_tipo_comprobante">
                                  <option value="0" selected>Seleccionar</option>
                                  <?php foreach ($cbox_tipo_comprobante as $cbox_tipo_comprobante) : ?><option value="<?php echo $cbox_tipo_comprobante->id_dmultitabla; ?>"><?php echo $cbox_tipo_comprobante->descripcion; ?>
                                    </option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Num. Comprobante</label>
                              <div class="input-group">
                                <div class="input-group">
                                  <input type="text" class="form-control" id="num_comprobante" placeholder="EJEMPLO:F002-0000194">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Sucursal</label>
                              <div class="input-group">
                                <select class="form-control select2" id="id_almacen" style="width: 100%;">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                                    <option value="<?php echo $cbox_almacen->id_dmultitabla; ?>"><?php echo $cbox_almacen->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="cargo">Fecha Emision</label>
                              <div class="input-group">
                                <input type="date" class="form-control" id="fecha_emision">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Fecha Vencimiento</label>
                              <div class="input-group">
                                <input type="date" class="form-control" id="fecha_vencimiento">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Tipo Compra / Cobranza</label>
                              <div class="input-group">
                                <select class="form-control select2" id="id_tipo_compra_cobranza" style="width: 100%;">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_tipo_compra_cobranza as $cbox_tipo_compra_cobranza) : ?>
                                    <option value="<?php echo $cbox_tipo_compra_cobranza->id_dmultitabla; ?>"><?php echo $cbox_tipo_compra_cobranza->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Estado</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_estado_compra_cobranza">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_estado_compra_cobranza as $cbox_estado_compra_cobranza) : ?>
                                    <option value="<?php echo $cbox_estado_compra_cobranza->id_dmultitabla; ?>"><?php echo $cbox_estado_compra_cobranza->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <!-- <div class="card card-primary collapsed-card"> -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Datos de Cliente / Proveedor</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-5">
                              <label for="">Cliente / Proveedor</label>
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
                                          <h4 class="modal-title">Cliente / Proveedor </h4>
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
                                <textarea class="form-control" rows="1" id="observacion"></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Condicion Pago</label>
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

                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="cargo">Moneda</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_moneda">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_moneda as $cbox_moneda) : ?>
                                    <option value="<?php echo $cbox_moneda->id_dmultitabla; ?>"><?php echo $cbox_moneda->descripcion; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Sub Total</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="sub_total">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Igv</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="igv">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="cargo">Total</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="total">
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

                            <div class="col-md-6">
                              <div class="card card-primary">
                                <!-- <div class="card card-primary collapsed-card"> -->
                                <div class="card-header">
                                  <h3 class="card-title">Condiciones de Pago</h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-plus"></i>
                                    </button>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="form-group row">
                                    <div class="col-md-5">
                                      <label>Fecha Cuota</label>
                                      <div class="input-group">
                                        <input type="date" class="form-control" id="fecha_cuota" value="" autocomplete="nope">
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <label>Monto Cuota</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" id="monto_cuota" value="" autocomplete="nope">
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <label for="">&nbsp;</label>
                                      <div class="input-group">
                                        <button type="button" class="btn btn-outline-success" id="id_agregar_programacion_pagos"><span class="fas fa-plus"></span></button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-md-12">
                                      <div class="card card-primary">
                                        <div class="card-header">
                                          <h3 class="card-title">Detalle Condicion Pago</h3>
                                        </div>
                                        <form class="form-horizontal">
                                          <div class="card-body" style="overflow-x:auto;">
                                            <table id="id_table_detalle_programacion_pagos">
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
                                                  <th>Total:
                                                    <label style="font-weight: normal;" class="control-label" id="total_label"></label>
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

                            <div class="col-md-12">
                              <div class="card card-primary">
                                <!-- <div class="card card-primary collapsed-card"> -->
                                <div class="card-header">
                                  <h3 class="card-title">Detalle de Pago</h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-plus"></i>
                                    </button>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="col-md-12">
                                    <div class="form-group row">
                                      <div class="col-md-3">
                                        <label for="cargo">Fecha Deposito</label>
                                        <div class="input-group">
                                          <input type="date" class="form-control" id="fecha_deposito">
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <label for="cargo">Num. Deposito</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="num_deposito">
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <label for="cargo">Num. Letra / Cheque</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="num_letra_cheque">
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <label for="cargo">Medio Pago</label>
                                        <select class="form-select select2" id="id_medio_pago" style="width: 100%;">
                                          <option value="0">Seleccionar</option>
                                          <?php foreach ($cbox_medio_pago as $cbox_medio_pago) : ?>
                                            <option value="<?php echo $cbox_medio_pago->id_dmultitabla; ?>"><?php echo $cbox_medio_pago->descripcion; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                      </div>

                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group row">
                                      <div class="col-md-3">
                                        <label for="cargo">Banco</label>
                                        <div class="input-group">
                                          <select class="form-select select2" id="id_banco">
                                            <option value="0">Seleccionar</option>
                                            <?php foreach ($cbox_banco  as $cbox_banco) : ?>
                                              <option value="<?php echo $cbox_banco->id_dmultitabla; ?>"><?php echo $cbox_banco->descripcion; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <label for="cargo">Monto</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="monto">
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <label for="cargo">Tipo Cambio</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="tipo_cambio">
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <label for="">&nbsp;</label>
                                        <div class="input-group">
                                          <button type="button" class="btn btn-outline-success" id="id_agregar_compras_cobranzas"><span class="fas fa-plus"></span></button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <form class="form-horizontal">
                                      <div class="card-body" style="overflow-x:auto;">
                                        <table id="id_table_detalle_compras_cobranzas" style="width: 100%;">
                                          <thead>
                                            <tr>
                                              <th>Item</th>
                                              <th>Fecha Deposito</th>
                                              <th>Num. Deposito</th>
                                              <th>Num. Letra / Cheque</th>
                                              <th>Medio Pago</th>
                                              <th>Banco</th>
                                              <th>Monto</th>
                                              <th>Tipo Cambio</th>
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

                                  <div class="col-md-12">
                                    <div class="form-group row">
                                      <div class="col-md-3">
                                        <label for="">Total </label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="total_espejo" value="" readonly>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <label for="">Pagado </label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="pagado" readonly>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <label for="">Pendiente</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" id="pendiente" readonly>
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

<script src="<?php echo base_url() ?>application/js/j_compras_cobranzas.js"></script>

</body>

</html>