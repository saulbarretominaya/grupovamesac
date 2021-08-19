<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Trabajadores
            <button type="button" class="btn btn-warning btn-sm" id="actualizar_trabajadores">ACTUALIZAR</button>
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
          <div class="card card-info">
            <div class="card-header">
              <h2 class="card-title">Registro de Trabajadores</h3>
            </div>
            <div class="card-body">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Informacion Definir</h3>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate>
                    <!-- Esta Parte es la de los Combobox -->
                    <div class="form-row">
                      <!-- ID TRABAJADOR -->
                      <div class="col-md-3 mb-3">
                        <label for="id_trabajador">ID TRABAJADOR</label>
                        <div class="form-group">
                          <input type="text" class="form-control" id="id_trabajador" value="<?php echo $enlace_actualizar->id_trabajador; ?>" readonly="">
                        </div>
                      </div>
                      <!-- TIPO DE TRABAJADOR -->
                      <div class="col-md-3 mb-3">
                        <label for="tipo_trabajador">Tipo Trabajador</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTipoTrabajador"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="tipo_trabajador" aria-describedby="inputGroupTipoTrabajador" required>
                            <option selected>Seleciona...</option>
                            <?php foreach ($cbox_tipo_trabajador as $cbox_tipo_trabajador) : ?>
                              <?php if ($cbox_tipo_trabajador->id_dmultitabla == $enlace_actualizar->id_tipo_trabajador) : ?>
                                <option value="<?php echo $cbox_tipo_trabajador->id_dmultitabla; ?>" selected=>
                                  <?php echo $cbox_tipo_trabajador->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_tipo_trabajador->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_trabajador->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- TIPO DE LOCAL -->
                      <div class="col-md-3 mb-3">
                        <label for="almacen">Almacen</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupAlmacen"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="almacen" aria-describedby="inputGroupAlmacen" required>
                            <option selected>Seleciona...</option>
                            <?php foreach ($cbox_almacen as $cbox_almacen) : ?>
                              <?php if ($cbox_almacen->id_dmultitabla == $enlace_actualizar->id_almacen) : ?>
                                <option value="<?php echo $cbox_almacen->id_dmultitabla; ?>" selected=>
                                  <?php echo $cbox_almacen->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_almacen->id_dmultitabla; ?>">
                                  <?php echo $cbox_almacen->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- TIPO DE CARGO -->
                      <div class="col-md-3 mb-3">
                        <label for="cargo_trabajador">Cargo del Trabajador</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCargoTrabajador"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="cargo_trabajador" aria-describedby="inputGroupCargoTrabajador" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_cargo_trabajador as $cbox_cargo_trabajador) : ?>
                              <?php if ($cbox_cargo_trabajador->id_dmultitabla == $enlace_actualizar->id_cargo_trabajador) : ?>
                                <option value="<?php echo $cbox_cargo_trabajador->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_cargo_trabajador->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_cargo_trabajador->id_dmultitabla; ?>">
                                  <?php echo $cbox_cargo_trabajador->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Segunda Fila -->

                    <div class="form-row align-items-center">
                      <!-- TIPO DE SEXO -->
                      <div class="col-md-3 mb-3">
                        <label for="sexo">Sexo</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupSexo"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="sexo" aria-describedby="inputGroupSexo" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_sexo as $cbox_sexo) : ?>
                              <?php if ($cbox_sexo->id_dmultitabla == $enlace_actualizar->id_sexo) : ?>
                                <option value="<?php echo $cbox_sexo->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_sexo->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_sexo->id_dmultitabla; ?>">
                                  <?php echo $cbox_sexo->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- TIPO DE DOCUMENTO -->
                      <div class="col-md-4 ">
                        <label for="tipo_documento">Tipo Documento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTdocumento"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="tipo_documento" aria-describedby="inputGroupTdocumento" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_tipo_documento as $cbox_tipo_documento) : ?>
                              <?php if ($cbox_tipo_documento->id_dmultitabla == $enlace_actualizar->id_tipo_documento) : ?>
                                <option value="<?php echo $cbox_tipo_documento->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_tipo_documento->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_tipo_documento->id_dmultitabla; ?>">
                                  <?php echo $cbox_tipo_documento->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- NUMERO DE DOCUMENTO -->
                      <div class="col-md-4 ">
                        <label for="num_documento">Numero Documento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupNdocumento"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="num_documento" value="<?php echo $enlace_actualizar->num_documento; ?>" data-masked="" data-inputmask=" 'mask' : '99999999'" placeholder="Ingresa el N° Documento" aria-describedby="inputGroupNdocumento" required>
                          <div class="input-group-prepend">
                            <button class="btn btn-info" type="Submit">Buscar ( Consular Reniec)</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Segundo Card -->

              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Datos Personales</h3>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate>
                    <div class="form-row">
                      <!-- NOMBRES -->
                      <div class="col-md-4 mb-3">
                        <label for="nombres">Nombres</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupNombres"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="nombres" placeholder="Nombres" aria-describedby="inputGroupNombres" value="<?php echo $enlace_actualizar->nombres; ?>" required>
                        </div>
                      </div>
                      <!-- APELLIDO PATERNO -->
                      <div class="col-md-4 mb-3">
                        <label for="ape_paterno">Apellido Paterno</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupApePaterno"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="ape_paterno" placeholder="Apellido Paterno" aria-describedby="inputGroupApePaterno" value="<?php echo $enlace_actualizar->ape_paterno; ?>" required>
                        </div>
                      </div>
                      <!-- APELLIDO MATERNO -->
                      <div class="col-md-4 mb-3">
                        <label for="ape_materno">Apellido Materno</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupApeMaterno"> <i class="far fa-id-card"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="ape_materno" placeholder="Apellido Materno" aria-describedby="inputGroupApeMaterno" value="<?php echo $enlace_actualizar->ape_materno; ?>" required>
                        </div>
                      </div>
                    </div>

                    <!-- Segunda Fila -->

                    <div class="form-row">
                      <!-- CORREO ELECTRONICO -->
                      <div class="col-md-6 mb-3">
                        <label for="email">Correo</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCorreo"><i class="fas fa-at"></i></span>
                          </div>
                          <input type="text" class="form-control" id="email" placeholder="Email" aria-describedby="inputGroupCorreo" value="<?php echo $enlace_actualizar->email; ?>" required>
                          <div class="invalid-feedback">
                            Ingrese el correo electronico.
                          </div>
                        </div>
                      </div>
                      <!-- FECHA NACIMIENTO -->
                      <div class="col-md-4 mb-3">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupfechaNac"> <i class="far fa-calendar-alt"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="fecha_nacimiento" value="<?php echo date("d/m/Y", strtotime((str_replace('-', '/', $enlace_actualizar->fecha_nacimiento)))) ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                        </div>
                      </div>
                    </div>

                    <!-- Tercera Fila de DATOS PERSONALES -->
                    <div class="form-row">
                      <!-- NACIONALIDAD -->
                      <div class="col-md-4 mb-3">
                        <label for="nacionalidad">Nacionalidad</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupNacionalidad"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="nacionalidad" aria-describedby="inputGroupNacionalidad" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_nacionalidad as $cbox_nacionalidad) : ?>
                              <?php if ($cbox_nacionalidad->id_dmultitabla == $enlace_actualizar->id_nacionalidad) : ?>
                                <option value="<?php echo $cbox_nacionalidad->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_nacionalidad->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_nacionalidad->id_dmultitabla; ?>">
                                  <?php echo $cbox_nacionalidad->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- ESTADO CIVIL -->
                      <div class="col-md-4 mb-3">
                        <label for="est_civil">Estado Civil</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupEstadoCivil"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="est_civil" aria-describedby="inputGroupEstadoCivil" required>
                            <option selected>Seleciona...</option>
                            <?php foreach ($cbox_estado_civil as $cbox_estado_civil) : ?>
                              <?php if ($cbox_estado_civil->id_dmultitabla == $enlace_actualizar->id_est_civil) : ?>
                                <option value="<?php echo $cbox_estado_civil->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_estado_civil->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_estado_civil->id_dmultitabla; ?>">
                                  <?php echo $cbox_estado_civil->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <!-- GRADO DE INSTRUCCION-->
                      <div class="col-md-4 mb-3">
                        <label for="grado_instruccion">Grado Instruccion</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupGradoInstruccion"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="grado_instruccion" aria-describedby="inputGroupGradoInstruccion" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_grado_instruccion as $cbox_grado_instruccion) : ?>
                              <?php if ($cbox_grado_instruccion->id_dmultitabla == $enlace_actualizar->id_grado_instruccion) : ?>
                                <option value="<?php echo $cbox_grado_instruccion->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_grado_instruccion->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_grado_instruccion->id_dmultitabla; ?>">
                                  <?php echo $cbox_grado_instruccion->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Tercer Card -- UBIGEO -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Ubigeo</h3>
                </div>
                <div class="card-body">
                  <form class="needs-validation" novalidate>
                    <div class="form-row">
                      <!-- LUGAR DE NACIMIENTO -->
                      <div class="col-md-8 mb-3">
                        <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupLugarNacimiento"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="lugar_nacimiento" placeholder="Lugar de Nacimiento" aria-describedby="inputGroupLugarNacimiento" value="<?php echo $enlace_actualizar->lugar_nacimiento; ?>" required>
                        </div>
                      </div>
                      <!-- DEPARTAMENTO -->
                      <div class="col-md-4 mb-3">
                        <label for="departamento">Departamento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDepartamento"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="departamento" aria-describedby="inputGroupDepartamento" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_departamento as $cbox_departamento) : ?>
                              <?php if ($cbox_departamento->id_dmultitabla == $enlace_actualizar->id_departamento) : ?>
                                <option value="<?php echo $cbox_departamento->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_departamento->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_departamento->id_dmultitabla; ?>">
                                  <?php echo $cbox_departamento->descripcion; ?>
                                </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Segunda Fila -->
                    <div class="form-row">
                      <!-- DOMICILIO ACTUAL -->
                      <div class="col-md-8 mb-3">
                        <label for="domicilio">Domicilio Actual</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDomicilio"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="domicilio" placeholder="Domicilio Actual" aria-describedby="inputGroupDomicilio" value="<?php echo $enlace_actualizar->domicilio; ?>" required>
                        </div>
                      </div>
                      <!-- PROVINCIA -->
                      <div class="col-md-4 mb-3">
                        <label for="provincia">Provincia</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupProvincia"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="provincia" aria-describedby="inputGroupProvincia" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_provincia as $cbox_provincia) : ?>
                              <?php if ($cbox_provincia->id_dmultitabla == $enlace_actualizar->id_provincia) : ?>
                                <option value="<?php echo $cbox_provincia->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_provincia->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_provincia->id_dmultitabla; ?>">
                                  <?php echo $cbox_provincia->descripcion; ?>
                                </option>
                              <?php endif; ?>
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
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupReferencia"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="referencia" placeholder="Ingresa la Referencia" aria-describedby="inputGroupReferencia" value="<?php echo $enlace_actualizar->referencia; ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <!-- TELEFONO-->
                      <div class="col-md-4 mb-3">
                        <label for="telefono">Telefono</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupTelefono"> <i class="fas fa-phone-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" id="telefono" value="<?php echo $enlace_actualizar->telefono; ?>" data-inputmask='"mask": "(99) 999-9999"' data-mask>
                        </div>
                      </div>
                      <!-- CELULAR -->
                      <div class="col-md-4 mb-3">
                        <label for="celular">Celular</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupCelular"> <i class="fas fa-mobile-alt"></i> </span>
                          </div>
                          <input type="text" class="form-control" id="celular" value="<?php echo $enlace_actualizar->celular; ?>" data-inputmask="'mask': ['999999999', '+099 999 999 999']" data-mask>
                        </div>
                      </div>
                      <!-- DISTRITO -->
                      <div class="col-md-4 mb-3">
                        <label for="distrito">Distrito</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupDistrito"> <i class="fas fa-user-shield"></i> </span>
                          </div>
                          <select class="custom-select " id="distrito" aria-describedby="inputGroupDistrito" required>
                            <option selected>Selecciona...</option>
                            <?php foreach ($cbox_distrito as $cbox_distrito) : ?>
                              <?php if ($cbox_distrito->id_dmultitabla == $enlace_actualizar->id_distrito) : ?>
                                <option value="<?php echo $cbox_distrito->id_dmultitabla; ?>" selected>
                                  <?php echo $cbox_distrito->descripcion; ?>
                                </option>
                              <?php else : ?>
                                <option value="<?php echo $cbox_distrito->id_dmultitabla; ?>">
                                  <?php echo $cbox_distrito->descripcion; ?>
                                </option>
                              <?php endif; ?>
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
      <!-- /.row -->
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

</body>

</html>