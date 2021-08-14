  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TRABAJADORES
              <a href="<?php echo base_url(); ?>C_trabajadores/enlace_registrar" class="btn btn-primary">REGISTRAR</a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listar</h3>
          </div>
          <div class="card-body">
            <table id="example" class="table table-sm table-hover" style="width: 100%;">
              <thead style="background-color: #9fa53b; color: white;">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Celular</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_trabajador; ?></td>
                      <td><?php echo $index->nombres; ?></td>
                      <td><?php echo $index->ape_paterno; ?></td>
                      <td><?php echo $index->ape_materno; ?></td>
                      <td><?php echo $index->celular; ?></td>
                      <td><a href="<?php echo base_url(); ?>C_trabajadores/enlace_actualizar/<?php echo $index->id_trabajador; ?>" class="btn btn-warning btn-xs"><span class="fas fa-edit "></span></a></td>
                      <!-- <td><a href="<?php echo base_url(); ?>C_trabajadores/enlace_actualizar/<?php echo $index->id_trabajador; ?>" class="btn btn-warning btn-xs"><span class="fas fa-edit "></span></a></td> -->

                      <!-- <td>
                        <button type="button" class="btn btn-danger btn-xs eliminar_fila"><span class="fas fa-trash-alt"></span></button>
                        <input type="hidden" name="value_id_solicitud" id="value_id_solicitud" value="<?php echo $detalle->id_dmultitabla; ?>">
                      </td> -->
                      <td class="text-center" style="width: 15px;"><a href="<?php echo base_url(); ?>C_trabajadores/eliminar/<?php echo $index->id_trabajador; ?>" class="btn btn-danger btn-remove btn-xs"><span class="fa fa-trash"></a></td>

                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Celular</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.div -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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

  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>

  <script src="<?php echo base_url() ?>application/js/j_trabajadores.js"></script>

  </body>

  </html>