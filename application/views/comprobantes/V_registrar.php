<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Comprobantes
            <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_comprobantes" class="btn btn-danger btn-sm">CANCELAR</a>
          </h1>
        </div>
      </div>
    </div>
    <input type="hidden" id="precio_venta" value="<?php echo $enlace_registrar_cabecera->precio_venta; ?>">
    <input type="hidden" id="id_guia_remision" value="<?php echo $enlace_registrar_cabecera->id_guia_remision; ?>">
    <input type="hidden" id="id_comprobante_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
    <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
    <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>">
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
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row">

                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Datos Comprobante</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-4">
                              <label for="">Tipo Comprobante</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_tipo_comprobante">
                                  <option value="0" selected>Seleccionar</option>
                                  <?php foreach ($cbox_tipo_comprobante_facturas_boletas as $cbox_tipo_comprobante_facturas_boletas) : ?><option value="<?php echo $cbox_tipo_comprobante_facturas_boletas->id_dmultitabla; ?>"><?php echo $cbox_tipo_comprobante_facturas_boletas->descripcion; ?>
                                    </option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Datos Vendedor</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-12">
                              <label>Nombre</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="" readonly><?php echo $enlace_registrar_cabecera->ds_nombre_trabajador ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Fecha Comprobante</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-4">
                              <label for="cargo">Fecha Emision</label>
                              <div class="input-group">
                                <?php
                                date_default_timezone_set("America/Lima");
                                ?>
                                <input type="date" class="form-control" id="fecha_emision" value="<?php echo date("Y-m-d"); ?>" readonly>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label># Dias</label>
                              <div class="input-group">
                                <!-- <input type="text" class="form-control" id="numero_dias_condicion_pago"> -->
                                <input type="text" class="form-control" id="dias" value="" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label>Fecha Vencimiento</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="fecha_vencimiento" readonly>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Informacion Extra</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label>Orden Compra</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="orden_compra" value="" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label># Guia</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="" value="<?php echo $enlace_registrar_cabecera->id_tienda ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="card">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                              <label>Fecha</label>
                              <div class="input-group">
                                <input type="date" class="form-control" id="fecha_cuota" value="">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label>Monto</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="monto_cuota" value="" autocomplete="off" placeholder="">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">&nbsp;</label>
                              <div class="input-group">
                                <button type="button" class="btn btn-outline-success" id="id_agregar_condicion_pago"><span class="fas fa-plus"></span></button>
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
                                          <th>Monto Total:
                                            <label style="font-weight: normal;" class="control-label" id="monto_total_condicion_pago"></label>
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

                    <div class="col-md-4">
                      <div class="card">
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
                            <div class="col-md-12">
                              <label for="">Cliente</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="" readonly><?php echo $enlace_registrar_cabecera->ds_nombre_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="">Direccion Fiscal</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="" readonly><?php echo $enlace_registrar_cabecera->direccion_fiscal_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-12">
                              <label for="tipo_trabajador">Observacion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="observacion"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Detalle Comprobante</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <div class="card-body" style="overflow-x:auto;">
                                <table id="id_table_detalle_cotizacion">
                                  <thead>
                                    <tr>
                                      <th>Item</th>
                                      <th>Cantidad</th>
                                      <th>Codigo</th>
                                      <th>Descripcion</th>
                                      <th>Marca</th>
                                      <th>U.M.</th>
                                      <th>Precio U</th>
                                      <th>Dscto %</th>
                                      <th>Precio U/D</th>
                                      <th>Valor Venta</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach ($enlace_registrar_detalle as $index) : ?>
                                      <tr>
                                        <td><?php echo $index->item; ?></td>
                                        <td><?php echo $index->cantidad; ?></td>
                                        <td><?php echo $index->codigo_producto; ?></td>
                                        <td><?php echo $index->descripcion_producto; ?></td>
                                        <td><?php echo $index->ds_marca_producto; ?></td>
                                        <td><?php echo $index->ds_unidad_medida; ?></td>
                                        <td><?php echo $index->precio_u; ?></td>
                                        <td><?php echo $index->d; ?></td>
                                        <td><?php echo $index->precio_u_d; ?></td>
                                        <td><?php echo $index->valor_venta; ?></td>
                                      </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <td colspan="9" class="text-right"><strong>TOTAL BRUTO</strong></td>
                                      <td><?php echo $enlace_registrar_cabecera->valor_venta_total_sin_d; ?></td>
                                    </tr>
                                    <tr>
                                      <td colspan="9" class="text-right"><strong> DCTO TOTAL</strong></td>
                                      <td><?php echo $enlace_registrar_cabecera->descuento_total; ?> </td>
                                    </tr>
                                    <tr>
                                      <td colspan="9" class="text-right"><strong> TOTAL</strong></td>
                                      <td><?php echo $enlace_registrar_cabecera->valor_venta_total_con_d; ?> </td>
                                    </tr>
                                    <tr>
                                      <td colspan="9" class="text-right"><strong>IGV</strong></td>
                                      <td><?php echo $enlace_registrar_cabecera->igv; ?> </td>
                                    </tr>
                                    <tr>
                                      <td colspan="9" class="text-right"><strong>PRECIO VENTA</strong></td>
                                      <td><?php echo $enlace_registrar_cabecera->precio_venta; ?> </td>
                                    </tr>
                                  </tfoot>
                                </table>
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

<script src="<?php echo base_url() ?>application/js/j_comprobantes.js"></script>

</body>

</html>