  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Guia Remision
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
                        <th>Num OD</th>
                        <th>Num Orden</th>
                        <th>Serie</th>
                        <th>Num Guia</th>
                        <th>Sucursal</th>
                        <th>Fecha Guia</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio venta</th>
                        <th>Vendedor</th>
                        <th>Estado OR</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index)) : ?>
                        <?php foreach ($index as $index) :
                          switch ($index->ds_estado_parcial_completa) {
                            case "PARCIAL":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-dark">PARCIAL</span></div>';
                              break;
                            case "COMPLETA":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-primary">COMPLETA</span></div>';
                              break;
                          }

                        ?>
                          <tr>
                            <td><?php echo $index->id_orden_despacho; ?></td>
                            <td><?php echo $index->id_parcial_completa; ?></td>
                            <td><?php echo $index->ds_serie_guia_remision; ?></td>
                            <td><?php echo $index->id_sucursal; ?></td>
                            <td><?php echo $index->ds_sucursal_trabajador; ?></td>
                            <td><?php echo $index->fecha_guia_remision; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_parcial_completa; ?></td>
                            <?php if ($index->id_guia_remision != "") { ?>
                              <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_guia_remision_productos" value="<?php echo $index->id_guia_remision; ?>" data-toggle="modal" data-target="#id_target_guia_remision_productos"><span class="fas fa-search-plus"></span></button></td>
                              <td><a href=" <?php echo base_url(); ?>C_guia_remision/enlace_actualizar/<?php echo $index->id_guia_remision; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                            <?php } else { ?>
                              <td></td>
                              <td><a href=" <?php echo base_url(); ?>C_guia_remision/enlace_registrar/<?php echo $index->id_parcial_completa; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                            <?php } ?>
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
                        <th>Num OD</th>
                        <th>Num Orden</th>
                        <th>Serie</th>
                        <th>Num Guia</th>
                        <th>Sucursal</th>
                        <th>Fecha Guia</th>
                        <th>Cliente</th>
                        <th>Condicion Pago</th>
                        <th>Moneda</th>
                        <th>Precio venta</th>
                        <th>Vendedor</th>
                        <th>Estado OR</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($index_2)) : ?>
                        <?php foreach ($index_2 as $index) :
                          switch ($index->ds_estado_parcial_completa) {
                            case "PARCIAL":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-dark">PARCIAL</span></div>';
                              break;
                            case "COMPLETA":
                              $ds_estado_parcial_completa = '<div><span class="badge bg-primary">COMPLETA</span></div>';
                              break;
                          }

                        ?>
                          <tr>
                            <td><?php echo $index->id_orden_despacho; ?></td>
                            <td><?php echo $index->id_parcial_completa; ?></td>
                            <td><?php echo $index->ds_serie_guia_remision; ?></td>
                            <td><?php echo $index->id_sucursal; ?></td>
                            <td><?php echo $index->ds_sucursal_trabajador; ?></td>
                            <td><?php echo $index->fecha_guia_remision; ?></td>
                            <td><?php echo $index->ds_nombre_cliente_proveedor; ?></td>
                            <td><?php echo $index->ds_condicion_pago; ?></td>
                            <td><?php echo $index->ds_moneda; ?></td>
                            <td><?php echo $index->precio_venta; ?></td>
                            <td><?php echo $index->ds_nombre_trabajador; ?></td>
                            <td><?php echo $ds_estado_parcial_completa; ?></td>
                            <?php if ($index->id_guia_remision != "") { ?>
                              <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_guia_remision_tableros" value="<?php echo $index->id_guia_remision; ?>" data-toggle="modal" data-target="#id_target_guia_remision_tableros"><span class="fas fa-search-plus"></span></button></td>
                            <?php } else { ?>
                              <td></td>
                            <?php } ?>
                            <td><a href=" <?php echo base_url(); ?>C_guia_remision/enlace_registrar/<?php echo $index->id_parcial_completa; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
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

  <!-- Inicio Modal Guia Remision Productos -->
  <div class="modal fade" id="id_target_guia_remision_productos" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Guia Remision Productos -->

  <!-- Inicio Modal Guia Remision Tableros -->
  <div class="modal fade" id="id_target_guia_remision_tableros" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <!-- Fin de Modal Guia Remision Tableros -->


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

  <script src="<?php echo base_url() ?>application/js/j_guia_remision.js"></script>

  </body>

  </html>