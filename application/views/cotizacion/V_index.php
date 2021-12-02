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
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="listar" class="table table-bordered table-sm table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>Num Cotizacion</th>
                  <th>Fecha</th>
                  <th>Cliente</th>
                  <th>Moneda</th>
                  <th>Monto</th>
                  <th>Estado</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>

                    <?php
                    switch ($index->ds_estado_valor) {
                      case "0":
                        $ds_estado = '<div class="text-center"><span class="badge bg-warning">PENDIENTE</span></div>';
                        break;
                      case "1":
                        $ds_estado = '<div class="text-center"><span class="badge bg-success">APROBADO</span></div>';
                        break;
                      case "2":
                        $ds_estado = '<div class="text-center"><span class="badge bg-secondary">CADUCADO</span></div>';
                        break;
                    }
                    ?>

                    <tr>
                      <td><?php echo $index->id_cotizacion; ?></td>
                      <td><?php echo $index->fecha_cotizacion; ?></td>
                      <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                      <td><?php echo $index->ds_moneda; ?></td>
                      <td><?php echo $index->precio_venta; ?></td>
                      <td><?php echo $ds_estado; ?> </td>

                      <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_cotizacion" value="<?php echo $index->id_cotizacion; ?>" data-toggle="modal" data-target="#id_target_cotizacion"><span class="fas fa-search-plus"></span></button></td>
                      <!-- Inicio Modal -->
                      <div class="modal fade" id="id_target_cotizacion" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                          <div class="modal-content">
                          </div>
                        </div>
                      </div>
                      <!-- Fin de Modal -->
                      <td><a class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                      <td><button id="btn_aprobar_estado" type="button" class="btn btn-outline-success btn-sm " value="<?php echo $index->id_cotizacion; ?>"><span class="fas fa-check-circle"></span></button></td>
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
      <!-- /.div -->
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