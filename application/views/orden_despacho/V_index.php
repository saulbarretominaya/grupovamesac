  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orden Despacho / Linea Credito
            </h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">


      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Listar Productos</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table id="listar" class="table table-bordered table-sm table-hover" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Num. Cotizacion</th>
                        <th>Fecha Cotizacion</th>
                        <th>Num. O. Despacho</th>
                        <th>Fecha O. Despacho</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Tipo Cambio</th>
                        <th>Resultado Valor $</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Estado O. Despacho</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index)) : ?>
                        <?php foreach ($index as $index) : ?>
                          <?php
                          switch ($index->ds_estado_orden_despacho) {
                            case "PENDIENTE":
                              $ds_estado_orden_despacho = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_orden_despacho = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            case "DESAPROBADO":
                              $ds_estado_orden_despacho = '<div><span class="badge bg-danger">DESAPROBADO</span></div>';
                              break;
                          }
                          ?>
                          <tr>
                            <input type="hidden" id="id_cotizacion" value="<?php echo $index->id_cotizacion; ?>">
                            <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
                            <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>">
                            <input type="hidden" id="id_orden_despacho" value="<?php echo $index->id_orden_despacho; ?>">
                            <input type="hidden" value="<?php echo $index->id_cliente_proveedor; ?>" name="id_cliente_proveedor">
                            <input type="hidden" value="<?php echo $index->linea_credito_dolares; ?>" name="linea_credito_dolares">
                            <input type="hidden" value="<?php echo $index->credito_unitario_dolares; ?>" name="credito_unitario_dolares">
                            <input type="hidden" value="<?php echo $index->disponible_dolares; ?>" name="disponible_dolares">
                            <td><?php echo $index->id_cotizacion_empresa; ?></td>
                            <td><?php echo $index->fecha_cotizacion; ?></td>
                            <td><?php echo $index->id_orden_despacho_empresa; ?> </td>
                            <td><?php echo $index->fecha_orden_despacho; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->valor_cambio; ?></td>
                            <td><?php echo $index->resultado_valor_cambio; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_orden_despacho; ?> </td>
                            <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_orden_despacho_productos" value="<?php echo $index->id_orden_despacho; ?>" data-toggle="modal" data-target="#id_target_orden_despacho_productos"><span class="fas fa-search-plus"></span></button></td>
                            <td><a class="btn btn btn-outline-warning btn-sm btn_aplicar_tipo_cambio"><span class="fas fa-dollar-sign"></span></a></td>
                            <td><a class="btn btn btn-outline-success btn-sm btn_aprobar_estado"><span class="fas fa-check-circle"></span></a></td>
                            <td><a class="btn btn btn-outline-danger btn-sm btn_desaprobar_estado"><span class="fas fa-times-circle"></span></a></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Listar Tableros</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table id="listar_2" class="table table-bordered table-sm table-hover" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Num. Cotizacion</th>
                        <th>Fecha Cotizacion</th>
                        <th>Num. O. Despacho</th>
                        <th>Fecha O. Despacho</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Tipo Cambio</th>
                        <th>Resultado Valor $</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Estado O. Despacho</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index_2)) : ?>
                        <?php foreach ($index_2 as $index) : ?>

                          <?php
                          switch ($index->ds_estado_orden_despacho) {
                            case "PENDIENTE":
                              $ds_estado_orden_despacho = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_orden_despacho = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            case "DESAPROBADO":
                              $ds_estado_orden_despacho = '<div><span class="badge bg-danger">DESAPROBADO</span></div>';
                              break;
                          }
                          ?>
                          <tr>
                            <input type="hidden" id="id_cotizacion" value="<?php echo $index->id_cotizacion; ?>">
                            <input type="hidden" id="id_trabajador" value="<?php echo $this->session->userdata("id_trabajador") ?>">
                            <input type="hidden" id="ds_nombre_trabajador" value="<?php echo $this->session->userdata("ds_nombre_trabajador") ?>">
                            <input type="hidden" id="id_orden_despacho" value="<?php echo $index->id_orden_despacho; ?>">
                            <input type="hidden" value="<?php echo $index->id_cliente_proveedor; ?>" name="id_cliente_proveedor">
                            <input type="hidden" value="<?php echo $index->linea_credito_dolares; ?>" name="linea_credito_dolares">
                            <input type="hidden" value="<?php echo $index->credito_unitario_dolares; ?>" name="credito_unitario_dolares">
                            <input type="hidden" value="<?php echo $index->disponible_dolares; ?>" name="disponible_dolares">
                            <td><?php echo $index->id_cotizacion_empresa; ?></td>
                            <td><?php echo $index->fecha_cotizacion; ?></td>
                            <td><?php echo $index->id_orden_despacho_empresa; ?> </td>
                            <td><?php echo $index->fecha_orden_despacho; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->valor_cambio; ?></td>
                            <td><?php echo $index->resultado_valor_cambio; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_orden_despacho; ?> </td>
                            <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_orden_despacho_tableros" value="<?php echo $index->id_orden_despacho; ?>" data-toggle="modal" data-target="#id_target_orden_despacho_tableros"><span class="fas fa-search-plus"></span></button></td>
                            <td><a class="btn btn btn-outline-warning btn-sm btn_aplicar_tipo_cambio"><span class="fas fa-dollar-sign"></span></a></td>
                            <td><a class="btn btn btn-outline-success btn-sm btn_aprobar_estado"><span class="fas fa-check-circle"></span></a></td>
                            <td><a class="btn btn btn-outline-danger btn-sm btn_desaprobar_estado"><span class="fas fa-times-circle"></span></a></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>
  </div>

  <!-- Inicio Modal Orden Despacho Productos -->
  <div class="modal fade" id="id_target_orden_despacho_productos" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Orden Despacho Productos -->

  <!-- Inicio Modal Orden Despacho Tableros -->
  <div class="modal fade" id="id_target_orden_despacho_tableros" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Orden Despacho Tableros -->

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

  <script src="<?php echo base_url() ?>application/js/j_orden_despacho.js"></script>

  </body>

  </html>