  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trabajadores
              <button type="button" class="btn btn-primary btn-sm" id="registrar">REGISTRAR</button>
              <a href="<?php echo base_url(); ?>C_trabajadores" class="btn btn-danger btn-sm">CANCELAR</a>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-primary">
              <div class="card-header">
                <h2 class="card-title">Registro de Trabajadores</h3>
              </div>
              <div class="card-body">
                <div class="card card-primary collapsed-card">
                  <div class=" card-header">
                    <h3 class="card-title">Datos de la Empresa</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <form class="needs-validation" novalidate>
                      <!-- Esta Parte es la de los Combobox -->
                      <div class="form-row">
                        <!-- TIPO DE TRABAJADOR -->
                        <div class="col-md-3 mb-3">
                          <label for="tipo_trabajador">Tipo Trabajador</label>
                          <div class="input-group">
                            <select class="form-select " data-placeholder="Prueba" id="tipo_trabajador" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_tipo_trabajador as $cbox_tipo_trabajador) : ?>
                                <option value="<?php echo $cbox_tipo_trabajador->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_trabajador->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <!-- EMPRESA -->
                        <div class="col-md-3 mb-3">
                          <label for="tipo_documento">Empresa</label>
                          <div class="input-group">
                            <select class="form-select " id="id_empresa" aria-describedby="inputGroupTdocumento" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_empresa as $cbox_empresa) : ?>
                                <option value="<?php echo $cbox_empresa->id_dmultitabla; ?>">
                                  <?php echo $cbox_empresa->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <!-- SUCURSAL (ALMACEN) -->
                        <div class="col-md-3 mb-3">
                          <label for="almacen">Sucursal</label>
                          <div class="input-group">
                            <select class="form-select " id="almacen" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                                <option value="<?php echo $cbox_almacen->id_dmultitabla; ?>">
                                  <?php echo $cbox_almacen->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <!-- CARGO DEL TRABAJADOR -->
                        <div class="col-md-3 mb-3">
                          <label for="cargo_trabajador">Cargo del Trabajador</label>
                          <div class="input-group">
                            <select class="form-select " id="cargo_trabajador" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_cargo_trabajador as $cbox_cargo_trabajador) : ?>
                                <option value="<?php echo $cbox_cargo_trabajador->id_dmultitabla; ?>">
                                  <?php echo $cbox_cargo_trabajador->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- Segunda Fila -->
                      <div class="form-row align-items-center">
                        <!-- SEXO -->
                        <div class="col-md-3 mb-3">
                          <label for="sexo">Sexo</label>
                          <div class="input-group">
                            <select class="form-select " id="sexo" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_sexo as $cbox_sexo) : ?>
                                <option value="<?php echo $cbox_sexo->id_dmultitabla; ?>">
                                  <?php echo $cbox_sexo->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <!-- TIPO DE DOCUMENTO -->
                        <div class="col-md-3 mb-3">
                          <label for="tipo_documento">Tipo Documento</label>
                          <div class="input-group">
                            <select class="form-select " id="tipo_documento" aria-describedby="inputGroupTdocumento" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_tipo_documento as $cbox_tipo_documento) : ?>
                                <option value="<?php echo $cbox_tipo_documento->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_documento->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <!-- NUMERO DE DOCUMENTO -->
                        <div class="col-md-3 mb-3">
                          <label for="num_documento">Numero Documento</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="num_documento" maxlength="15" placeholder="Ingresa el N° Documento" required>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Segundo Card -->
                <div class="card card-primary collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title">Datos Personales</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <form class="needs-validation" novalidate>
                      <div class="form-row">
                        <!-- NOMBRES -->
                        <div class="col-md-4 mb-3">
                          <label for="nombres">Nombres</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="nombres" placeholder="Nombres" required>
                          </div>
                        </div>
                        <!-- APELLIDO PATERNO -->
                        <div class="col-md-4 mb-3">
                          <label for="ape_paterno">Apellido Paterno</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="ape_paterno" placeholder="Apellido Paterno" required>
                          </div>
                        </div>
                        <!-- APELLIDO MATERNO -->
                        <div class="col-md-4 mb-3">
                          <label for="ape_materno">Apellido Materno</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="ape_materno" placeholder="Apellido Materno" required>
                          </div>
                        </div>
                      </div>
                      <!-- Segunda Fila -->
                      <div class="form-row">
                        <!-- CORREO -->
                        <div class="col-md-7 mb-3">
                          <label for="email">Correo</label>
                          <div class="input-group">
                            <input type="email" class="form-control" id="email" placeholder="Email" required>
                            <div class="invalid-feedback">
                              Ingrese el correo electronico.
                            </div>
                          </div>
                        </div>
                        <!-- FECHA DE NACIMIENTO -->
                        <div class="col-md-4 mb-3">
                          <label for="fecha_nacimiento">Fecha Nacimiento</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="fecha_nacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                          </div>
                        </div>
                      </div>
                      <!-- Tercera Fila de DATOS PERSONALES -->
                      <div class="form-row">
                        <!-- NACIONALIDAD -->
                        <div class="col-md-4 mb-3">
                          <label for="nacionalidad">Nacionalidad</label>
                          <div class="input-group">
                            <select class="form-select " id="nacionalidad" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_nacionalidad as $cbox_nacionalidad) : ?>
                                <option value="<?php echo $cbox_nacionalidad->id_dmultitabla; ?>">
                                  <?php echo $cbox_nacionalidad->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <!-- ESTADO CIVIL -->
                        <div class="col-md-4 mb-3">
                          <label for="est_civil">Estado Civil</label>
                          <div class="input-group">
                            <select class="form-select " id="est_civil" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_estado_civil as $cbox_estado_civil) : ?>
                                <option value="<?php echo $cbox_estado_civil->id_dmultitabla; ?>">
                                  <?php echo $cbox_estado_civil->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <!-- GRADO DE INSTRUCCION -->
                        <div class="col-md-4 mb-3">
                          <label for="grado_instruccion">Grado Instruccion</label>
                          <div class="input-group">
                            <select class="form-select " id="grado_instruccion" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_grado_instruccion as $cbox_grado_instruccion) : ?>
                                <option value="<?php echo $cbox_grado_instruccion->id_dmultitabla; ?>">
                                  <?php echo $cbox_grado_instruccion->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Tercer Card -- UBIGEO -->
                <div class="card card-primary collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title">Ubigeo</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <form class="needs-validation" novalidate>
                      <div class="form-row">
                        <!-- LUGAR DE NACIMIENTO -->
                        <div class="col-md-8 mb-3">
                          <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="lugar_nacimiento" placeholder="Lugar de Nacimiento" required>
                          </div>
                        </div>
                        <!-- DEPARTAMENTO -->
                        <div class="col-md-4 mb-3">
                          <label for="departamento">Departamento</label>
                          <div class="input-group">
                            <select class="form-select " id="departamento" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_departamento as $cbox_departamento) : ?>
                                <option value="<?php echo $cbox_departamento->id_dmultitabla; ?>">
                                  <?php echo $cbox_departamento->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- Segunda Fila -->
                      <div class="form-row">
                        <!-- DOMICILIO ACTUAL-->
                        <div class="col-md-8 mb-3">
                          <label for="domicilio">Domicilio Actual</label>
                          <div class="input-group">

                            <input type="text" class="form-control" id="domicilio" placeholder="Domicilio Actual" required>
                          </div>
                        </div>
                        <!-- PROVINCIA -->
                        <div class="col-md-4 mb-3">
                          <label for="provincia">Provincia</label>
                          <div class="input-group">
                            <select class="form-select " id="provincia" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_provincia as $cbox_provincia) : ?>
                                <option value="<?php echo $cbox_provincia->id_dmultitabla; ?>">
                                  <?php echo $cbox_provincia->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <!-- REFERENCIA -->
                        <div class="col-md-12 mb-3">
                          <label for="referencia">Referencia</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="referencia" placeholder="Ingresa la Referencia" required>
                            <div class="valid-feedback">
                              Se ve bien!
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <!-- TELEFONO -->
                        <div class="col-md-4 mb-3">
                          <label for="telefono">Telefono</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="telefono" data-inputmask='"mask": "(99) 999-9999"' data-mask>
                          </div>
                        </div>
                        <!-- CELULAR -->
                        <div class="col-md-4 mb-3">
                          <label for="celular">Celular</label>
                          <div class="input-group">

                            <!-- <input type="text" class="form-control" id="celular" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask> -->
                            <input type="text" class="form-control" id="celular" data-inputmask="'mask': ['999999999', '+099 999 999 999']" data-mask>
                          </div>
                        </div>
                        <!-- DISTRITO -->
                        <div class="col-md-4 mb-3">
                          <label for="distrito">Distrito</label>
                          <div class="input-group">
                            <select class="form-select " id="distrito" required>
                              <option value="0" selected>Seleccionar</option>
                              <?php foreach ($cbox_distrito as $cbox_distrito) : ?>
                                <option value="<?php echo $cbox_distrito->id_dmultitabla; ?>">
                                  <?php echo $cbox_distrito->descripcion; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.div -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- COMIENZA EL FOOTER  --- COMIENZA EL FOOTER --- COMIENZA EL FOOTER --- COMIENZA EL FOOTER -->

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

  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>

  <script src="<?php echo base_url() ?>application/js/j_trabajadores.js"></script>
  <!-- <script src="<?php echo base_url() ?>application/js/j_multitablas.js"></script> -->



  </body>

  </html>