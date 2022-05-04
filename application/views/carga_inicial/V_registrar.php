<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Carga inicial
            <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_carga_inicial" class="btn btn-danger btn-sm">CANCELAR</a>
          </h1>
        </div>
      </div>
    </div>
    <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
    <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>">
    <input type="hidden" id="id_carga_inicial_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
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
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Detalle Carga Inicial</a>
                </li>
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-3">
                          <label for="cargo">Fecha Carga Inicial</label>
                          <div class="input-group">
                            <?php
                            date_default_timezone_set("America/Lima");
                            ?>

                            <input type="date" class="form-control" id="fecha_carga_inicial" value="<?php echo date("Y-m-d"); ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="cargo">Tipo Ingreso</label>
                          <div class="input-group">
                            <select class="form-select select2" id="id_tipo_ingreso">
                              <option value="0">Seleccionar</option>
                              <?php foreach ($cbox_tipo_ingresos as $cbox_tipo_ingresos) : ?>
                                <option value="<?php echo $cbox_tipo_ingresos->id_dmultitabla; ?>"><?php echo $cbox_tipo_ingresos->descripcion; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2">
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
                          <label for="cargo">Tipo cambio</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="tipo_cambio">
                          </div>
                        </div>

                      </div>

                      <!-- <div class="card card-primary collapsed-card"> -->
                      <div class="card card-primary ">
                        <div class="card-header">
                          <h3 class="card-title">Datos de Cliente/Proveedor</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="">Cliente/Proveedor</label>
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
                                          <h4 class="modal-title">Clientes Proveedores</h4>
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
                            <div class="col-md-3">
                              <label for="">N. Guia</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="num_guia"></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">N. Orden Compra</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="num_orden_compra"></textarea>
                              </div>
                            </div>

                          </div>



                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="cargo">Tipo de Comprobante</label>
                              <select class="form-select select2" id="id_tipo_comprobante">
                                <option value="0" selected>Seleccionar</option>
                                <?php foreach ($cbox_tipo_comprobante as $cbox_tipo_comprobante) : ?>
                                  <option value="<?php echo $cbox_tipo_comprobante->id_dmultitabla; ?>">
                                    <?php echo $cbox_tipo_comprobante->descripcion; ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="col-md-3">
                              <label for="">Fecha Comprobante</label>
                              <div class="input-group">
                                <input type="date" class="form-control" id="fecha_comprobante" autocomplete="nope">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Num. Comprobante</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="num_comprobante" autocomplete="nope">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Observacion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="observacion"></textarea>
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
                        <div class="col-md-10">
                          <div class="card card-primary">
                            <!-- <div class="card card-primary collapsed-card"> -->
                            <div class="card-header">
                              <h3 class="card-title">Entrada de Producto</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="form-group row">
                                <div class="col-md-8">
                                  <label for="">Descripcion</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="descripcion_producto" readonly>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="">Almacen</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="ds_almacen" readonly>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-md-2">
                                  <label for="">Stock Actual</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="stock_actual" readonly>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label for="">Nueva Cant.</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="nueva_cantidad">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label for="">Total Stock</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="total_stock" readonly>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label for="">Precio Unitario</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="precio_unitario">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label for="">Valor Total</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="valor_total" readonly>
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <label for="">&nbsp;</label>
                                  <div class="input-group">
                                    <button type="button" class="btn btn-outline-success" id="id_agregar_carga_inicial"><span class="fas fa-plus"></span></button>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Producto -->
                        <div class="col-md-2">
                          <div class="form-check">
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#opcion_target_producto">
                            </button>
                            <label class="form-check-label">Productos</label>
                            <div class="modal fade" id="opcion_target_producto" tabindex="-1">
                              <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Productos</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table id="id_datatable_productos" class="table table-bordered table-sm table-hover table-responsive">
                                      <thead>
                                        <tr>
                                          <th></th>
                                          <th id="dtable_ds_almacen">Almacen</th>
                                          <th id="dtable_codigo">Codigo</th>
                                          <th id="dtable_descripcion_producto">Nombre del Producto</th>
                                          <th id="dtable_ds_unidad_medida">U.M</th>
                                          <th id="dtable_ds_marca_producto">Marca</th>
                                          <th id="dtable_ds_grupo">Grupo</th>
                                          <th id="dtable_stock">Stock</th>
                                          <th id="dtable_ds_moneda">Moneda</th>
                                          <th id="dtable_precio_unitario">Precio Unitario</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php if (!empty($index_productos)) : ?>
                                          <?php foreach ($index_productos as $index_productos) : ?>
                                            <tr>
                                              <td>
                                                <?php $split_productos =
                                                  $index_productos->id_producto . "*" .
                                                  $index_productos->id_almacen . "*" .
                                                  $index_productos->ds_almacen . "*" .
                                                  $index_productos->codigo_producto . "*" .
                                                  $index_productos->descripcion_producto . "*" .
                                                  $index_productos->id_unidad_medida . "*" .
                                                  $index_productos->ds_unidad_medida . "*" .
                                                  $index_productos->id_marca_producto . "*" .
                                                  $index_productos->ds_marca_producto . "*" .
                                                  $index_productos->id_moneda . "*" .
                                                  $index_productos->ds_moneda . "*" .
                                                  $index_productos->precio_unitario . "*" .
                                                  $index_productos->stock;
                                                ?>
                                                <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_producto" value="<?php echo $split_productos; ?>" data-toggle="modal" data-target="#opcion_target_producto"><span class="fas fa-check"></span></button>
                                              </td>
                                              <td><?php echo $index_productos->ds_almacen; ?></td>
                                              <td><?php echo $index_productos->codigo_producto; ?></td>
                                              <td><?php echo $index_productos->descripcion_producto; ?></td>
                                              <td><?php echo $index_productos->ds_unidad_medida; ?></td>
                                              <td><?php echo $index_productos->ds_marca_producto; ?></td>
                                              <td><?php echo $index_productos->ds_grupo; ?></td>
                                              <td><?php echo $index_productos->stock; ?></td>
                                              <td><?php echo $index_productos->ds_moneda; ?></td>
                                              <td><?php echo $index_productos->precio_unitario; ?></td>
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
                          </div>
                        </div>
                      </div>
                      <input type="hidden" id="hidden_id_producto">
                      <input type="hidden" id="hidden_id_almacen">
                      <input type="hidden" id="hidden_codigo_producto">
                      <input type="hidden" id="hidden_id_unidad_medida">
                      <input type="hidden" id="hidden_ds_unidad_medida">
                      <input type="hidden" id="hidden_id_marca_producto">
                      <input type="hidden" id="hidden_ds_marca_producto">
                      <input type="hidden" id="hidden_item">
                    </div>

                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Detalle Carga inicial</h3>
                        </div>
                        <form class="form-horizontal">
                          <div class="card-body" style="overflow-x:auto;">
                            <table id="id_table_detalle_carga_inicial" style="width: 100%;">
                              <thead>
                                <tr>
                                  <th>Item </th>
                                  <th>Almacen </th>
                                  <th class="table-info">Codigo </th>
                                  <th class="table-info">Descripcion</th>
                                  <th class="table-info">U.M</th>
                                  <th class="table-info">Marca</th>
                                  <th class="table-info">Stock Actual</th>
                                  <th>Nueva Cant.</th>
                                  <th>Total Stock</th>
                                  <th>Precio Unitario</th>
                                  <th>Valor Total</th>
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
                          <label for="">Monto Total </label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="monto_total" readonly>
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

<script src="<?php echo base_url() ?>application/js/j_carga_inicial.js"></script>

</body>

</html>