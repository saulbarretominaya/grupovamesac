  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Multitablas
              <button type="button" class="btn btn-warning btn-sm" id="actualizar">ACTUALIZAR</button>
              <a href="<?php echo base_url(); ?>C_multitablas" class="btn btn-danger btn-sm">CANCELAR</a>

            </h1>
          </div>
        </div>
      </div>
    </section>


    <!-- CODIGOS OCULTOS -->
    <input type="hidden" class="form-control" id="id_multitabla" value="<?php echo $cabecera->id_multitabla; ?>">
    <table id="container_id_dmultitabla_eliminar" style="display: none;">
      <tbody>
      </tbody>
    </table>
    <table id="container_id_dmultitabla_actualizar" style="display: none;">
      <tbody>
      </tbody>
    </table>
    <!-- FIN DE CODIGOS OCULTOS -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos Generales</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">

                    <label class="col-sm-2 col-form-label">Nombre General</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="nombre_tabla" value="<?php echo $cabecera->nombre_tabla; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Abreviatura</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="abreviatura">
                    </div>
                    <label class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="descripcion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-0 col-form-label"></label>
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-primary btn-sm" id="id_agregar_multitabla">AGREGAR</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detalle Multitablas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <table id="id_table_detalle_multitablas" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Abreviatura</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($detalle)) : ?>
                        <?php foreach ($detalle as $detalle) : ?>
                          <tr>
                            <td><input type="text" class="form-control" value="<?php echo $detalle->abreviatura; ?>" id="abreviatura" readonly></td>
                            <td><input type="text" class="form-control" value="<?php echo $detalle->descripcion; ?>" id="descripcion" readonly></td>
                            <?php if ($detalle->id_dmultitabla != null) { ?>
                              <td>
                                <button type="button" class="btn btn-outline-warning button_actualizar_fila"><span class="far fa-edit"></span></button>
                                <input type="hidden" name="id_dmultitabla_actualizar" id="id_dmultitabla_actualizar" value="<?php echo $detalle->id_dmultitabla; ?>">
                              </td>
                              <td>
                                <button type="button" class="btn btn-outline-danger eliminar_fila"><span class="far fa-trash-alt"></span></button>
                                <input type="hidden" name="id_dmultitabla_eliminar" id="id_dmultitabla_eliminar" value="<?php echo $detalle->id_dmultitabla; ?>">
                              </td>
                            <?php } else { ?>
                              <td></td>
                            <?php } ?>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->

          </div>


        </div>
        <!-- /.row -->
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

  <script src="<?php echo base_url() ?>application/js/j_multitablas.js"></script>

  </body>

  </html>