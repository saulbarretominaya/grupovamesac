<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Guia Remision
            <button type="button" class="btn btn-warning btn-sm" id="actualizar">ACTUALIZAR</button>
            <a href="<?php echo base_url(); ?>C_guia_remision" class="btn btn-danger btn-sm">CANCELAR</a>
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
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Detalle Guia Remision</a>
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
                          <label for="cargo">Vendedor</label>
                          <div class="input-group">
                            <input type="hidden" id="id_guia_remision" value="<?php echo $enlace_actualizar_cabecera->id_guia_remision ?>">
                            <input type="text" class="form-control" id="" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Num. Guia</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="" value="<?php echo $enlace_actualizar_cabecera->id_tienda ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Serie</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="" value="<?php echo $enlace_actualizar_cabecera->ds_serie_guia_remision ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <label for="cargo">Tienda</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="" value="<?php echo $enlace_actualizar_cabecera->ds_sucursal_trabajador ?>" readonly>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <label for="cargo">Fecha Emision</label>
                          <div class="input-group">
                            <?php
                            date_default_timezone_set("America/Lima");
                            ?>
                            <input type="date" class="form-control" id="" value="<?php echo date("Y-m-d"); ?>" readonly>
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
                                <textarea class="form-control" rows="1" id="lugar_entrega"><?php echo $enlace_actualizar_cabecera->lugar_entrega ?></textarea>
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
                                <textarea class="form-control" rows="1" id="" readonly><?php echo $enlace_actualizar_cabecera->observacion ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Unidad de Transporte y Conducto</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="">Tipo de Transporte</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="tipo_transporte"><?php echo $enlace_actualizar_cabecera->tipo_transporte ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">RUC</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="ruc"><?php echo $enlace_actualizar_cabecera->ruc ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Transportista</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="transportista"><?php echo $enlace_actualizar_cabecera->transportista ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Domiciliado</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="domiciliado"><?php echo $enlace_actualizar_cabecera->domiciliado ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="">Licencia</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="licencia"><?php echo $enlace_actualizar_cabecera->licencia ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Marca y Modelo</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="marca_modelo"><?php echo $enlace_actualizar_cabecera->marca_modelo ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Placa</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="placa"><?php echo $enlace_actualizar_cabecera->placa ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Observaciones</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="observaciones"><?php echo $enlace_actualizar_cabecera->observaciones ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Envio</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group row">
                            <div class="col-md-3">
                              <label for="">Tipo Envio</label>
                              <div class="input-group">
                                <select class="form-select select2" id="id_tipo_envio_guia_remision" style="width: 100%;">
                                  <option value="0">Seleccionar</option>
                                  <?php foreach ($cbox_tipo_envio_guia_remision as $cbox_tipo_envio_guia_remision) : ?>
                                    <?php if ($cbox_tipo_envio_guia_remision->id_dmultitabla == $enlace_actualizar_cabecera->id_tipo_envio_guia_remision) : ?>
                                      <option value="<?php echo $cbox_tipo_envio_guia_remision->id_dmultitabla; ?>" selected>
                                        <?php echo $cbox_tipo_envio_guia_remision->descripcion; ?>
                                      </option>
                                    <?php else : ?>
                                      <option value="<?php echo $cbox_tipo_envio_guia_remision->id_dmultitabla ?>">
                                        <?php echo $cbox_tipo_envio_guia_remision->descripcion; ?>
                                      </option>
                                    <?php endif; ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Peso Bruto Total</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="peso_bruto_total"><?php echo $enlace_actualizar_cabecera->peso_bruto_total ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <label for="">Num Bultos</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="num_bulto" value="<?php echo $enlace_actualizar_cabecera->num_bulto ?>">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="">Punto de Partida</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="punto_partida"><?php echo $enlace_actualizar_cabecera->punto_partida ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="">Punto de Llegada</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="punto_llegada"><?php echo $enlace_actualizar_cabecera->punto_llegada ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Contenedor</label>
                              <div class="input-group">
                                <input type="text" class="form-control" id="contenedor" autocomplete="nope" value="<?php echo $enlace_actualizar_cabecera->contenedor ?>">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="">Embarque</label>
                              <div class="input-group">
                                <textarea class="form-control" rows="1" id="embarque"><?php echo $enlace_actualizar_cabecera->embarque ?></textarea>
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
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Detalle Guia Remision</h3>
                        </div>
                        <form class="form-horizontal">
                          <div class="card-body" style="overflow-x:auto;">
                            <table id="id_table_detalle_cotizacion">
                              <thead>
                                <tr>
                                  <th>Item</th>
                                  <th>Cantidad</th>
                                  <th>Codigo</th>
                                  <th>Descripcion</th>
                                  <th>Marca</th>
                                  <th>U.M</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <?php if (!empty($enlace_actualizar_detalle)) : ?>
                                <?php foreach ($enlace_actualizar_detalle as $index) : ?>
                                  <tr>
                                    <td><?php echo $index->item; ?></td>
                                    <td><?php echo $index->salida_prod; ?></td>
                                    <td><?php echo $index->codigo_producto; ?></td>
                                    <td><?php echo $index->descripcion_producto; ?></td>
                                    <td><?php echo $index->ds_marca_producto; ?></td>
                                    <td><?php echo $index->ds_unidad_medida; ?></td>
                                  </tr>
                                <?php endforeach; ?>
                              <?php endif; ?>
                              </tbody>
                            </table>
                          </div>
                        </form>
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

<script src="<?php echo base_url() ?>application/js/j_guia_remision.js"></script>

</body>

</html>