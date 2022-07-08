<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>ELABORAR PARCIALES / COMPLETAS
            <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
            <a href="<?php echo base_url(); ?>C_elaborar_pc" class="btn btn-danger btn-sm">CANCELAR</a>
          </h3>
        </div>
      </div>
    </div>
    <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
    <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>" readonly>
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

                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-4">
                          <label for="">Vendedor</label>
                          <div class="input-group">
                            <input type="hidden" id="id_orden_despacho" value="<?php echo $enlace_actualizar_cabecera_tableros->id_orden_despacho ?>">
                            <input type="hidden" id="hidden_item">
                            <input type="text" class="form-control" id="" value="<?php echo $enlace_actualizar_cabecera_tableros->ds_nombre_trabajador ?>" readonly>
                            <input type="hidden" id="id_parcial_completa_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
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
                                <input type="text" class="form-control" id="ds_nombre_cliente_proveedor" value="<?php echo $enlace_actualizar_cabecera_tableros->ds_nombre_cliente_proveedor ?>" readonly>
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
                                <textarea class="form-control" rows="1" id="ds_departamento_cliente_proveedor" readonly><?php echo $enlace_actualizar_cabecera_tableros->ds_departamento_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Provincia</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_provincia_cliente_proveedor" readonly><?php echo $enlace_actualizar_cabecera_tableros->ds_provincia_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Distrito</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ds_distrito_cliente_proveedor" readonly><?php echo $enlace_actualizar_cabecera_tableros->ds_distrito_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="">Direccion Fiscal</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="direccion_fiscal_cliente_proveedor" autocomplete="nope" readonly><?php echo $enlace_actualizar_cabecera_tableros->direccion_fiscal_cliente_proveedor ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Correo Electronico</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="email_cliente_proveedor" autocomplete="nope" readonly value="<?php echo $enlace_actualizar_cabecera_tableros->email_cliente_proveedor ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Clausula</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="clausula" readonly><?php echo $enlace_actualizar_cabecera_tableros->clausula ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Lugar Entrega</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="lugar_entrega" readonly><?php echo $enlace_actualizar_cabecera_tableros->lugar_entrega ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="tipo_trabajador">Nombre Encargado</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="nombre_encargado" value="Richard Torres Torres" readonly value="<?php echo $enlace_actualizar_cabecera_tableros->nombre_encargado ?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="tipo_trabajador">Observacion</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="observacion" readonly><?php echo $enlace_actualizar_cabecera_tableros->observacion ?></textarea>
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
                            <table id="id_table_detalle_parciales_completas" style="width: 100%;">
                              <thead>
                                <tr>
                                  <th class="table-danger">N°</th>
                                  <th>Item </th>
                                  <th>Codigo </th>
                                  <th>Descripcion</th>
                                  <th>U.M</th>
                                  <th>Marca</th>
                                  <th>Precio U</th>
                                  <th>Precio U/D</th>
                                  <th>D Unidad</th>
                                  <th>D Cant/Total</th>
                                  <th>Cant Tabl</th>
                                  <th>Valor Venta</th>
                                  <th class="table-info">Salida Tabl</th>
                                  <th class="table-info">Pendiente Tabl</th>
                                  <th class="table-info">D Cant/T</th>
                                  <th class="table-info">Valor Venta Sin/D</th>
                                  <th class="table-info">Valor Venta Con/D</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php if (!empty($enlace_actualizar_detalle_tableros)) : ?>
                                  <?php foreach ($enlace_actualizar_detalle_tableros as $index) : ?>
                                    <tr>
                                      <input type="hidden" value="<?php echo $index->id_dcotizacion; ?>" name="id_dcotizacion[]">
                                      <td class="table-danger"><input type="text" class="form-control" id="item" name="item[]" readonly></td>
                                      <td><?php echo $index->item; ?></td>
                                      <td><?php echo $index->codigo_producto; ?></td>
                                      <td><?php echo $index->descripcion_producto; ?></td>
                                      <td><?php echo $index->ds_unidad_medida; ?></td>
                                      <td><?php echo $index->ds_marca_producto; ?></td>
                                      <td><?php echo $index->precio_ganancia; ?></td>
                                      <td><?php echo $index->precio_descuento; ?></td>
                                      <td><?php echo $index->d_unidad; ?></td>
                                      <td><?php echo $index->d_cant_total; ?></td>
                                      <td><?php echo $index->cantidad_por_despachar; ?></td>
                                      <td><?php echo $index->valor_venta_con_d; ?> </td>
                                      <td class="table-info"><input type="text" class="form-control" id="salida_prod_tablero" name="salida_prod[]"> </td>
                                      <td class="table-info"><input type="text" class="form-control" id="pendiente_prod" value="" name="pendiente_prod[]" readonly></td>
                                      <td class="table-info"><input type="text" class="form-control" id="d_cant_total" value="" name="d_cant_total[]" readonly></td>
                                      <td class="table-info"><input type="text" class="form-control" id="valor_venta_sin_d" value="" name="valor_venta_sin_d[]" readonly></td>
                                      <td class="table-info"><input type="text" class="form-control" id="valor_venta_con_d" value="" name="valor_venta_con_d[]" readonly></td>
                                      <input type="hidden" class="form-control" id="id_estado_elaborar_pc" value="" name="id_estado_elaborar_pc[]" readonly>
                                    </tr>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                              </tbody>
                            </table>
                          </div>
                        </form>
                      </div>

                    </div>

                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-3">
                          <label for="">Valor V. Total Sin/D</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="valor_venta_total_sin_d" value="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for=" local">DCTO Total</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="descuento_total" value="">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="">Valor V. Total Con/D</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="valor_venta_total_con_d" value="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for=" local">IGV</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="igv" value="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="sexo">Precio Venta</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="precio_venta" value="">
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

<script src="<?php echo base_url() ?>application/js/j_elaborar_pc.js"></script>

</body>

</html>