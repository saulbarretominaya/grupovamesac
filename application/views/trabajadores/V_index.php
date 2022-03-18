  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trabajadores
              <a href="<?php echo base_url(); ?>C_trabajadores/enlace_registrar" class="btn btn-primary btn-sm">REGISTRAR</a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">Listar</h3>
          </div> -->
          <div class="card-body">
            <table id="listar" class="table table-bordered table-sm table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>Codigo Trabajador</th>
                  <th>Tipo Documento</th>
                  <th>N° Documento</th>
                  <th>Nombres</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Celular</th>
                  <th>Trabaja RRHH</th>
                  <th>Sucursal</th>
                  <th>Cargo</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($index)) : ?>
                  <?php foreach ($index as $index) : ?>
                    <tr>
                      <td><?php echo $index->id_trabajador_empresa; ?></td>
                      <td><?php echo $index->ds_tipo_documento; ?></td>
                      <td><?php echo $index->num_documento; ?></td>
                      <td><?php echo $index->nombres; ?></td>
                      <td><?php echo $index->ape_paterno; ?></td>
                      <td><?php echo $index->ape_materno; ?></td>
                      <td><?php echo $index->celular; ?></td>
                      <td><?php echo $index->ds_empresa; ?></td>
                      <td><?php echo $index->ds_sucursal; ?></td>
                      <td><?php echo $index->ds_cargo_trabajador; ?></td>
                      <td><button type="button" class="btn btn-outline-info js_lupa_trabajador btn-sm" value="<?php echo $index->id_trabajador; ?>" data-toggle="modal" data-target="#id_target_trabajador"><span class="fa fa-search"></span></button></td>
                      <td><a href="<?php echo base_url(); ?>C_trabajadores/enlace_actualizar/<?php echo $index->id_trabajador; ?>" class="btn btn-outline-warning btn-sm"><span class="fas fa-edit "></span></a></td>
                      <td><a href="<?php echo base_url(); ?>C_trabajadores/eliminar/<?php echo $index->id_trabajador; ?>" class="btn btn-outline-danger btn-remove btn-sm"><span class="fa fa-trash"></a></td>
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


  <div class="modal fade" id="id_target_trabajador" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
      </div>
    </div>
  </div>

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

  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>

  <script src="<?php echo base_url() ?>application/js/j_trabajadores.js"></script>

  </body>

  </html>