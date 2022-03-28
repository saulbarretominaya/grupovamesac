  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parciales / Completas
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
                        <th>Num. O. Despacho</th>
                        <th>Num. Orden</th>
                        <th>Fec. Orden</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Tipo Orden</th>
                        <th>Estado Orden</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index)) :
                        foreach ($index as $index) :

                          switch ($index->ds_estado_tipo_orden_parcial_completa) {
                            case "PARCIAL":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-dark">PARCIAL</span></div>';
                              break;
                            case "COMPLETA":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-primary">COMPLETA</span></div>';
                              break;
                          }

                          switch ($index->ds_estado_parcial_completa) {
                            case "PENDIENTE":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            case "ANULADO":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-danger">ANULADO</span></div>';
                              break;
                          }
                      ?>
                          <tr>
                            <td><?php echo $index->id_orden_despacho_empresa; ?></td>
                            <input type="hidden" id="id_parcial_completa" value="<?php echo $index->id_parcial_completa; ?>">
                            <td><?php echo $index->id_parcial_completa_empresa; ?></td>
                            <td><?php echo $index->fecha_parcial_completa; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_tipo_orden_parcial_completa; ?></td>
                            <td><?php echo $ds_estado_parcial_completa; ?></td>
                            <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_parciales_completas_productos" value="<?php echo $index->id_parcial_completa; ?>" data-toggle="modal" data-target="#id_target_parciales_completas_productos"><span class="fas fa-search-plus"></span></button></td>
                            <td><button type="button" class="btn btn-outline-success btn-sm btn_aprobar_estado" value="<?php echo $index->id_parcial_completa; ?>"><span class="fas fa-check-circle"></span></button></td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm btn_anular_estado" value="<?php echo $index->id_parcial_completa; ?>"><span class="fas fa-times-circle"></span></button></td>
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
                        <th>Num. O. Despacho</th>
                        <th>Num. Orden</th>
                        <th>Fec. Orden</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio Venta</th>
                        <th>Vendedor</th>
                        <th>Tipo Orden</th>
                        <th>Estado Orden</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index_2)) :
                        foreach ($index_2 as $index) :

                          switch ($index->ds_estado_tipo_orden_parcial_completa) {
                            case "PARCIAL":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-dark">PARCIAL</span></div>';
                              break;
                            case "COMPLETA":
                              $ds_estado_tipo_orden_parcial_completa = '<div><span class="badge bg-primary">COMPLETA</span></div>';
                              break;
                          }

                          switch ($index->ds_estado_parcial_completa) {
                            case "PENDIENTE":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                              break;
                            case "APROBADO":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-success">APROBADO</span></div>';
                              break;
                            case "ANULADO":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-danger">ANULADO</span></div>';
                              break;
                          }


                      ?>
                          <tr>
                            <td><?php echo $index->id_orden_despacho_empresa; ?></td>
                            <input type="hidden" id="id_parcial_completa" value="<?php echo $index->id_parcial_completa; ?>">
                            <td><?php echo $index->id_parcial_completa_empresa; ?></td>
                            <td><?php echo $index->fecha_parcial_completa; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_tipo_orden_parcial_completa; ?></td>
                            <td><?php echo $ds_estado_parcial_completa; ?></td>
                            <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_parciales_completas_tableros" value="<?php echo $index->id_parcial_completa; ?>" data-toggle="modal" data-target="#id_target_parciales_completas_tableros"><span class="fas fa-search-plus"></span></button></td>
                            <td><button type="button" class="btn btn-outline-success btn-sm btn_aprobar_estado" value="<?php echo $index->id_parcial_completa; ?>"><span class="fas fa-check-circle"></span></button></td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm btn_anular_estado" value="<?php echo $index->id_parcial_completa; ?>"><span class="fas fa-times-circle"></span></button></td>
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

  <!-- Inicio Modal Parciales Completas Productos -->
  <div class="modal fade" id="id_target_parciales_completas_productos" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Parciales Completas Productos -->

  <!-- Inicio Modal Parciales Completas Tableros -->
  <div class="modal fade" id="id_target_parciales_completas_tableros" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Parciales Completas Tableros -->

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

  <script src="<?php echo base_url() ?>application/js/j_parciales_completas.js"></script>

  </body>

  </html>