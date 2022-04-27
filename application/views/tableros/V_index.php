  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tableros
              <a href="<?php echo base_url(); ?>C_tableros/enlace_registrar" class="btn btn-primary btn-sm">REGISTRAR</a>
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
                  <th>ID Tablero</th>
                  <th>Almacen</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Moneda</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_tablero_empresa; ?></td>
                      <td><?php echo $index->ds_almacen; ?></td>
                      <td><?php echo $index->codigo_tablero; ?></td>
                      <td><?php echo $index->descripcion_tablero; ?></td>
                      <td><?php echo $index->ds_marca_tablero; ?></td>
                      <td><?php echo $index->ds_modelo_tablero; ?></td>
                      <td><?php echo $index->ds_moneda; ?></td>
                      <td><button type="button" class="btn btn-outline-info btn-sm js_lupa_tablero" value="<?php echo $index->id_tablero; ?>" data-toggle="modal" data-target="#id_target_tablero"><span class="fas fa-search-plus"></span></button></td>
                      <td><a href=" <?php echo base_url(); ?>C_tableros/enlace_actualizar/<?php echo $index->id_tablero; ?>" class="btn btn-outline-warning btn-sm"><span class="far fa-edit"></span></a></td>
                      <!-- Inicio Modal -->
                      <div class="modal fade" id="id_target_tablero" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                          <div class="modal-content">
                          </div>
                        </div>
                      </div>
                      <!-- Fin de Modal -->
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
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

  <script src="<?php echo base_url() ?>application/js/j_tableros.js"></script>

  </body>

  </html>