  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios
              <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_usuarios" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Seleccionar Trabajador</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="">Trabajador</label>
                    <div class="input-group">
                      <input type="hidden" class="form-control" id="id_trabajador">
                      <input type="text" class="form-control" id="ds_nombre_trabajador" readonly>
                      <span class="input-group-append">
                        <button type="button" class="btn btn-outline-success btn-flat" data-toggle="modal" data-target="#opcion_target_trabajadores">
                          Buscar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="opcion_target_trabajadores" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Trabajadores</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table id="id_datatable_trabajadores" class="table table-bordered table-sm table-hover table-responsive">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th id="dtable_num_documento">Num. documento</th>
                                      <th id="dtable_nombres">Nombres</th>
                                      <th id="dtable_ape_paterno">Ape Paterno</th>
                                      <th id="dtable_ape_materno">Ape Materno</th>
                                      <th id="dtable_ds_cargo_trabajador">Cargo</th>
                                      <th id="dtable_ds_empresa">Trabaja RRHH</th>
                                      <th id="dtable_ds_sucursal">Sucursal</th>
                                      <th id="dtable_telefono">Celular</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if (!empty($index_trabajadores)) : ?>
                                      <?php foreach ($index_trabajadores as $index_trabajadores) : ?>
                                        <tr>
                                          <td>
                                            <?php $split_trabajadores =
                                              $index_trabajadores->id_trabajador . "*" .
                                              $index_trabajadores->ds_nombre_usuario . "*" .
                                              $index_trabajadores->ds_empresa . "*" .
                                              $index_trabajadores->ds_sucursal;
                                            ?>
                                            <button type="button" class="btn btn-outline-success btn-sm js_seleccionar_modal_trabajadores" value="<?php echo $split_trabajadores; ?>" data-toggle="modal" data-target="#opcion_target_trabajadores"><span class="fas fa-check"></span></button>
                                          </td>
                                          <td><?php echo $index_trabajadores->num_documento; ?></td>
                                          <td><?php echo $index_trabajadores->nombres; ?></td>
                                          <td><?php echo $index_trabajadores->ape_paterno; ?></td>
                                          <td><?php echo $index_trabajadores->ape_materno; ?></td>
                                          <td><?php echo $index_trabajadores->ds_cargo_trabajador; ?></td>
                                          <td><?php echo $index_trabajadores->ds_empresa; ?></td>
                                          <td><?php echo $index_trabajadores->ds_sucursal; ?></td>
                                          <td><?php echo $index_trabajadores->celular; ?></td>
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
                  <div class="col-md-3">
                    <label>Trabaja RRHH</label>
                    <div class="input-group">
                      <input class="form-control" type="text" class="form-control" id="ds_empresa" readonly>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>Sucursal</label>
                    <div class="input-group">
                      <input class="form-control" type="text" class="form-control" id="ds_almacen" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos del Usuario</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="col-md-8">
                        <label for="">Usuario</label>
                        <input class="form-control" type="text" class="form-control" id="usuario">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label for="">Contraseña</label>
                        <input class="form-control" type="password" class="form-control" id="password">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="col-md-8">
                        <label for="">Accesos Empresas</label>
                        <select class="form-select " id="id_empresa">
                          <option value="0" selected>Seleccionar</option>
                          <?php foreach ($cbox_empresa as $cbox_empresa) : ?>
                            <option value="<?php echo $cbox_empresa->id_dmultitabla; ?>">
                              <?php echo $cbox_empresa->descripcion; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label for="">Rol</label>
                        <select class="form-select" id="id_rol">
                          <option value="0">Seleccionar</option>
                          <?php foreach ($cbox_roles_usuarios as $cbox_roles_usuarios) : ?>
                            <option value="<?php echo $cbox_roles_usuarios->id_dmultitabla; ?>">
                              <?php echo $cbox_roles_usuarios->abreviatura; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
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

  <script src="<?php echo base_url() ?>application/js/j_usuarios.js"></script>

  </body>

  </html>