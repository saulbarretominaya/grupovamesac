  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cotizacion
              <a href="<?php echo base_url(); ?>C_cotizacion/enlace_registrar" class="btn btn-primary btn-sm">REGISTRAR</a>
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
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Estado Cotizacion</th>
                        <th></th>
                        <th>Num. O. Despacho</th>
                        <th>Estado O. Despacho</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index)) : ?>
                        <?php foreach ($index as $index) : ?>

                          <?php
                          switch ($index->ds_estado_cotizacion) {
                            case "PENDIENTE":
                              $ds_estado_cotizacion = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_cotizacion = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            case "CADUCADO":
                              $ds_estado_cotizacion = '<div><span class="badge bg-secondary">CADUCADO</span></div>';
                              break;
                          }
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
                            default;
                              $ds_estado_orden_despacho = '';
                              break;
                          }
                          ?>

                          <tr>
                            <input type="hidden" id="id_cotizacion" value="<?php echo $index->id_cotizacion; ?>">
                            <input type="hidden" id="id_orden_despacho_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
                            <input type="hidden" id="id_empresa" value="<?php echo $this->session->userdata("id_empresa") ?>">
                            <input type="hidden" id="id_orden_despacho" value="<?php echo $index->id_orden_despacho; ?>">
                            <td><?php echo $index->id_cotizacion_empresa; ?></td>
                            <td><?php echo $index->fecha_cotizacion; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_cotizacion; ?> </td>
                            <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_cotizacion_productos" value="<?php echo $index->id_cotizacion; ?>" data-toggle="modal" data-target="#id_target_cotizacion_productos"><span class="fas fa-search-plus"></span></button></td>
                            <td><?php echo $index->id_orden_despacho_empresa; ?> </td>
                            <td><?php echo $ds_estado_orden_despacho; ?> </td>
                            <?php if ($index->id_orden_despacho != NULL) { ?>
                              <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_orden_despacho_productos" value="<?php echo $index->id_orden_despacho; ?>" data-toggle="modal" data-target="#id_target_orden_despacho_productos"><span class="fas fa-search-plus"></span></button></td>
                            <?php } else { ?>
                              <td></td>
                            <?php } ?>
                            <td><a href=" <?php echo base_url(); ?>C_cotizacion/enlace_actualizar/<?php echo $index->id_cotizacion; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                            <input type="hidden" id="id_orden_despacho_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
                            <td><button type="button" class="btn btn-outline-success btn-sm btn_aprobar_estado" value="<?php echo $index->id_cotizacion; ?>"><span class="fas fa-check-circle"></span></button></td>
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
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Estado Cotizacion</th>
                        <th></th>
                        <th>Num. O. Despacho</th>
                        <th>Estado O. Despacho</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index_2)) : ?>
                        <?php foreach ($index_2 as $index) : ?>

                          <?php
                          switch ($index->ds_estado_cotizacion) {
                            case "PENDIENTE":
                              $ds_estado_cotizacion = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_cotizacion = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            case "CADUCADO":
                              $ds_estado_cotizacion = '<div><span class="badge bg-secondary">CADUCADO</span></div>';
                              break;
                          }
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
                            default:
                              $ds_estado_orden_despacho = '';
                              break;
                          }
                          ?>

                          <tr>
                            <input type="hidden" id="id_cotizacion" value="<?php echo $index->id_cotizacion; ?>">
                            <input type="hidden" id="id_orden_despacho_empresa" value="<?php echo $this->session->userdata("ds_ruc_empresa") ?>">
                            <input type="hidden" id="id_empresa" value="<?php echo $this->session->userdata("id_empresa") ?>">
                            <input type="hidden" id="id_orden_despacho" value="<?php echo $index->id_orden_despacho; ?>">
                            <td><?php echo $index->id_cotizacion_empresa; ?></td>
                            <td><?php echo $index->fecha_cotizacion; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_cotizacion; ?> </td>
                            <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_cotizacion_tableros" value="<?php echo $index->id_cotizacion; ?>" data-toggle="modal" data-target="#id_target_cotizacion_tableros"><span class="fas fa-search-plus"></span></button></td>
                            <td><?php echo $index->id_orden_despacho_empresa; ?> </td>
                            <td><?php echo $ds_estado_orden_despacho; ?> </td>
                            <?php if ($index->id_orden_despacho != NULL) { ?>
                              <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_orden_despacho_tableros" value="<?php echo $index->id_orden_despacho; ?>" data-toggle="modal" data-target="#id_target_orden_despacho_tableros"><span class="fas fa-search-plus"></span></button></td>
                            <?php } else { ?>
                              <td></td>
                            <?php } ?>
                            <td><a href=" <?php echo base_url(); ?>C_cotizacion/enlace_actualizar/<?php echo $index->id_cotizacion; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                            <td><button type="button" class="btn btn-outline-success btn-sm btn_aprobar_estado" value="<?php echo $index->id_cotizacion; ?>"><span class="fas fa-check-circle"></span></button></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>

  <!-- Inicio Modal Cotizacion Productos -->
  <div class="modal fade" id="id_target_cotizacion_productos" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Cotizacion Productos -->

  <!-- Inicio Modal Cotizacion Tableros -->
  <div class="modal fade" id="id_target_cotizacion_tableros" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Cotizacion Tableros -->

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

  <script src="<?php echo base_url() ?>application/js/j_cotizacion.js"></script>

  </body>

  </html>