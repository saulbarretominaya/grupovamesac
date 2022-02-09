<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>PARCIALES / COMPLETAS
            <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_parciales_completas" class="btn btn-danger btn-sm">CANCELAR</a>
          </h3>
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
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">

                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-4">
                          <label for="">Vendedor</label>
                          <div class="input-group">
                            <input type="hidden" id="id_cotizacion" value="<?php echo $enlace_actualizar_cabecera->id_cotizacion ?>">
                            <input type="text" class="form-control" id="" value="<?php echo $enlace_actualizar_cabecera->ds_nombre_trabajador ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="">Fecha</label>
                          <div class="input-group">
                            <?php
                            date_default_timezone_set("America/Lima");
                            ?>
                            <input type="date" class="form-control" id="fecha_parcial_completa" value="<?php echo date("Y-m-d"); ?>" readonly>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <label for="">Tipo Orden</label>
                          <div class="input-group">
                            <select class="form-select" id="id_tipo_orden">
                              <option value="0">Seleccionar</option>
                              <?php foreach ($cbox_tipo_orden_parcial_completa as $cbox_tipo_orden_parcial_completa) : ?>
                                <option value="<?php echo $cbox_tipo_orden_parcial_completa->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_orden_parcial_completa->abreviatura; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>


                      </div>

                      <div class="card collapsed-card">
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
                              <label for="">Cliente</label>
                              <div class="input-group">
                                <input type="hidden" class="form-control" id="id_cliente_proveedor">
                                <input type="text" class="form-control" id="ds_nombre_cliente_proveedor" value="<?php echo $enlace_actualizar_cabecera->ds_nombre_cliente_proveedor ?>" readonly>
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-outline-success btn-flat" data-toggle="modal" data-target="#opcion_target_clientes_proveedores" disabled>
                                    Buscar
                                  </button>
                                  <!-- <a href="<?php echo base_url() . "C_clientes_proveedores" ?>"><button type="button" class="btn btn-outline-primary"><i class="fas fa-user-plus"></i></button></a> -->
                                  <!-- Modal -->
                                  <div class="modal fade" id="opcion_target_clientes_proveedores" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Clientes / Provedores</h4>
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
                            <div class="col-md-2">
                              <label for="">Departamento</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_departamento_cliente_proveedor" readonly><?php echo $enlace_actualizar_cabecera->ds_departamento_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Provincia</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_provincia_cliente_proveedor" readonly><?php echo $enlace_actualizar_cabecera->ds_provincia_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Distrito</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_distrito_cliente_proveedor" readonly><?php echo $enlace_actualizar_cabecera->ds_distrito_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="">Direccion Fiscal</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="direccion_fiscal_cliente_proveedor" autocomplete="nope" readonly><?php echo $enlace_actualizar_cabecera->direccion_fiscal_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Correo Electronico</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="email_cliente_proveedor" autocomplete="nope" readonly value="<?php echo $enlace_actualizar_cabecera->email_cliente_proveedor ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Clausula</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="clausula" readonly><?php echo $enlace_actualizar_cabecera->clausula ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Lugar Entrega</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="lugar_entrega" readonly><?php echo $enlace_actualizar_cabecera->lugar_entrega ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="tipo_trabajador">Nombre Encargado</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="nombre_encargado" value="Richard Torres Torres" readonly value="<?php echo $enlace_actualizar_cabecera->nombre_encargado ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="tipo_trabajador">Observacion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="observacion" readonly><?php echo $enlace_actualizar_cabecera->observacion ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Detalle Parciales / Completas</h3>
                        </div>
                        <form class="form-horizontal">
                          <div class="card-body" style="overflow-x:auto;">
                            <table id="id_table_detalle_parciales_completas">
                              <thead>
                                <tr>
                                  <th>Codigo </th>
                                  <th>Descripcion</th>
                                  <th>U.M</th>
                                  <th>Marca</th>
                                  <th>Precio U</th>
                                  <th>Cant</th>
                                  <th>Valor Venta</th>
                                  <th class="table-info">Stock</th>
                                  <th class="table-info">Salida Prod</th>
                                  <th class="table-info">Pendiente Prod</th>
                                  <th class="table-info">Valor Venta</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if (!empty($enlace_actualizar_detalle)) : ?>
                                  <?php foreach ($enlace_actualizar_detalle as $index) : ?>
                                    <tr>
                                      <td><?php echo $index->codigo_producto; ?></td>
                                      <td><?php echo $index->descripcion_producto; ?></td>
                                      <td><?php echo $index->ds_unidad_medida; ?></td>
                                      <td><?php echo $index->ds_marca_producto; ?></td>
                                      <td><?php echo $index->precio_ganancia; ?></td>
                                      <td><?php echo $index->cantidad; ?></td>
                                      <td><?php echo $index->valor_venta; ?> </td>
                                      <td class="table-info"><?php echo $index->stock; ?> </td>
                                      <td class="table-info"><input type="text" class="form-control" id="salida_prod" name="salida_prod[]"> </td>
                                      <td class="table-info"><input type="text" class="form-control" id="pendiente_prod" value="" name="pendiente_prod[]" readonly></td>
                                      <td class="table-info"><input type="text" class="form-control" id="valor_venta" value="" name="valor_venta[]" readonly></td>
                                    </tr>
                                  <?php endforeach; ?>
                                <?php endif; ?>
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
                          <label for="tipo_trabajador">Total</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="total" value="" readonly>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for=" local">IGV</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="igv" value="" readonly>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="sexo">Precio Venta</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="precio_venta" value="" readonly>
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

<script src="<?php echo base_url() ?>application/js/j_parciales_completas.js"></script>

</body>

</html>