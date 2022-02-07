  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Elaborar Parcial / Completa
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
                  <th>Num COT</th>
                  <th>Num OD</th>
                  <th>Fecha OD</th>
                  <th>Cliente</th>
                  <th>Condicion Pago</th>
                  <th>Moneda</th>
                  <th>Monto OD</th>
                  <th>Vendedor</th>
                  <th>Estado OD</th>
                  <th>Estado OR</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) :
                    switch ($index->ds_estado_valor_od) {
                      case "0":
                        $ds_estado_od = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                        break;
                      case "1":
                        $ds_estado_od = '<div><span class="badge bg-success">APROBADO</span></div>';
                        break;
                      case "2":
                        $ds_estado_od = '<div><span class="badge bg-danger">DESAPROBADO</span></div>';
                        break;
                    }

                    switch ($index->ds_estado_valor_epc) {
                      case "0":
                        $ds_estado_epc = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                        break;
                      case "1":
                        $ds_estado_epc = '<div><span class="badge bg-info">FINALIZADO</span></div>';
                        break;
                      default;
                        $ds_estado_epc = '<div><span class="badge bg-warning">PENDIENTE</span></div>';
                        break;
                    }

                  ?>
                    <tr>
                      <td><?php echo $index->id_cotizacion; ?></td>
                      <td><?php echo $index->id_orden_despacho; ?></td>
                      <td><?php echo $index->fecha_orden_despacho; ?></td>
                      <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                      <td><?php echo $index->ds_condicion_pago; ?></td>
                      <td><?php echo $index->ds_moneda; ?></td>
                      <td><?php echo $index->precio_venta; ?></td>
                      <td><?php echo $index->ds_nombre_trabajador; ?></td>
                      <td><?php echo $ds_estado_od; ?> </td>
                      <td><?php echo $ds_estado_epc; ?> </td>
                      <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_elaborar_pc" value="<?php echo $index->id_orden_despacho; ?>" data-toggle="modal" data-target="#id_target_elaborar_pc"><span class="fas fa-search-plus"></span></button></td>
                      <td><a href=" <?php echo base_url(); ?>C_elaborar_pc/enlace_registrar?id_cotizacion=<?php echo $index->id_cotizacion; ?>&id_parcial_completa=<?php echo $index->id_parcial_completa; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
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

  <!-- Inicio Modal -->
  <div class="modal fade" id="id_target_elaborar_pc" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal -->

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

  <script src="<?php echo base_url() ?>application/js/j_elaborar_pc.js"></script>

  </body>

  </html>